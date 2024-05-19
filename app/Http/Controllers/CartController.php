<?php

namespace App\Http\Controllers;

use App\Models\carts;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        //php one time session//

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $sessionid = $_SESSION['sessionid'] ?? session_id();
        $_SESSION['sessionid'] = $sessionid;

        //end one time session//
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'product_id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
        ]);
        $isCardExist = carts::where('Product_id', $request->product_id)->where('session_id', $sessionid)->first();

        if ($isCardExist) {
            $isCardExist->Quantity += 1;
            $isCardExist->update();
        } else {
            $cartItem = new carts([
                'user_id' => $validatedData['user_id'],
                'product_id' => $validatedData['product_id'],
                'quantity' => $validatedData['quantity'],
                'session_id' => $sessionid,
            ]);
            $cartItem->save();
        }



        // Return a success response
        return response()->json(['message' => 'Product added to cart successfully'], 200);
    }
    public function allcartProduct()
    {
        session_start();
        $sessionid = $_SESSION['sessionid'] ?? null;
        if (!$sessionid) {
        }


        $carts = carts::where('session_id', $sessionid)->with('product')->get();
        return response()->json(['cart' => $carts], 200);
    }

    public function updatecartProduct(Request $request, $id)
    {

        $cart = carts::findOrFail($id);
        if ($request->add) {
            $cart->Quantity +=  1;
        } else {
            $cart->Quantity -= 1;
        }
        $cart->update();
        return response()->json(['message' => 'Cart updated successfully']);
    }

    public function deletecartProduct($id)

    {
        $carts = carts::findOrFail($id);
        $carts->delete();
        return response()->json(['message' => 'cart product deleted successfully'], 200);
    }
}
