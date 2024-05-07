<?php

namespace App\Http\Controllers;

use App\Models\order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function createorder(Request $request)
    {
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

        ]);

       
        return response()->json(['message' => 'order submitted successfully', 'orders' => $orders], 201);
    }

}