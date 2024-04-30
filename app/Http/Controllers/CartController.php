<?php

namespace App\Http\Controllers;

use App\Models\carts;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'product_id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = new carts([
            'user_id' => $validatedData['user_id'],
            'product_id' => $validatedData['product_id'],
            'quantity' => $validatedData['quantity'],
        ]);

        $cartItem->save();

        // Return a success response
        return response()->json(['message' => 'Product added to cart successfully'], 200);
    }
    public function allcartProduct()
    {
        $carts = carts::with('product')->get();
        // dd($carts);
        return response()->json(['cart' => $carts], 200);
    }

    public function deletecartProduct($id)

    {
        $carts = carts::findOrFail($id);
        $carts->delete();
        return response()->json(['message' => 'cart product deleted successfully'], 200);
    }
}
