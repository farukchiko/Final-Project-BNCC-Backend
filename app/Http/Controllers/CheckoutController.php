<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    // Tampilkan riwayat order user
    public function history()
    {
        $orders = Order::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('order-history', compact('orders'));
    }

    // Proses checkout keranjang
    public function store()
    {
        $carts = Cart::where('user_id', Auth::id())->with('product')->get();

        if ($carts->isEmpty()) {
            return redirect()->route('cart.index')->with('success', 'Cart is empty!');
        }

        DB::beginTransaction();
        try {
            $total = 0;

            // Hitung total & cek stok
            foreach ($carts as $cart) {
                if ($cart->product->stock < $cart->quantity) {
                    return back()->with('error', 'Stock not enough for ' . $cart->product->name);
                }
                $total += $cart->product->price * $cart->quantity;

                // Kurangi stock
                $cart->product->decrement('stock', $cart->quantity);
            }

            // Simpan order
            $order = Order::create([
                'user_id' => Auth::id(),
                'total_price' => $total,
            ]);

            // Simpan ke order_detail
            foreach ($carts as $cart) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $cart->product_id,
                    'quantity' => $cart->quantity,
                    'price' => $cart->product->price,
                ]);
            }

            // Hapus cart
            Cart::where('user_id', Auth::id())->delete();

            DB::commit();
            return redirect()->route('cart.index')->with('success', 'Checkout successful!');

        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Checkout failed: ' . $e->getMessage());
        }
    }
}