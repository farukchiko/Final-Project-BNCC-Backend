<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::where('user_id', Auth::id())->with('product')->get();
        return view('cart.index', compact('carts'));
    }

    public function store(Request $request, $productId)
    {
        $cart = Cart::where('user_id', Auth::id())
                    ->where('product_id', $productId)
                    ->first();

        if ($cart) {
            $cart->increment('quantity');
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $productId,
                'quantity' => 1,
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }

    public function destroy($id)
    {
        Cart::findOrFail($id)->delete();
        return back()->with('success', 'Item removed from cart!');
    }

    public function update(Request $request, $id)
    {
    $request->validate([
        'quantity' => 'required|integer|min:1'
    ]);

    $cart = Cart::findOrFail($id);
    $cart->update([
        'quantity' => $request->quantity
    ]);

    return back()->with('success', 'Quantity updated!');
    }
}