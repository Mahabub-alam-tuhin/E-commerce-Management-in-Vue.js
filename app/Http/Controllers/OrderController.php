<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\orderproducts;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function createorder(Request $request)
    {
         //php one time session//

         if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $sessionid = $_session['sessionid'] ?? session_id();
        $_session['sessionid'] = $sessionid;

        //end one time session//

        //  dd($request->all());
        $validatedData = $request->validate([

            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:orders,email',
            'phone' => 'required|string|min:9',
            'address' => 'required|', 
            'postcode' => 'required|string|min:4', 
            'amount' => 'required', 
        ]);

        $orders = order::create([
            'firstname' => $validatedData['firstname'],
            'lastname' => $validatedData['lastname'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'address' => $validatedData['address'],
            'postcode' => $validatedData['postcode'],
            'amount' => $validatedData['amount'],
            'order_status' => 'pending',
            'session_id' => $sessionid,

        ]);


        // $validatedData = $request->validate([
        //     'order_id' => 'required|integer',
        //     'product_id' => 'required|integer',
        //     'quantity' => 'required|integer|min:1',
        // ]);


        foreach($request->card_items as $item){
            $orderproduct = new orderproducts([
                'order_id' => $orders->id,
                'product_id' => $item['id'],
                'Quantity' => $item['qty'],
            ]);
            $orderproduct->save();
        }
       



       
        return response()->json(['message' => 'order submitted successfully', 'orders' => $orders], 201);
    }
    public function getorder()
    {
        $orders = order::all();
        // dd($products);
        return response()->json(['order' => $orders], 200);
    }
    public function details($id)
    {
        $orders = order::where('id', $id)->with('orderproducts')->findOrFail($id);
        dd($orders);
        return response()->json(['order' => $orders], 200);
    }
}