<?php

namespace App\Http\Controllers;

use App\Models\carts;
use App\Models\product;
use Carbon\Carbon;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function CreateProduct(Request $request)
    {
        //  dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|',
            'Description' => 'required|',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'Price' => 'required|',
            'Stock_quantity' => 'required|',
            'status' => 'required|',
        ]);

        // dd($validatedData);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = Str::slug($request->name . Carbon::now()->toDateTimeString()) . '.' . $image->getclientOriginalExtension();
            $directory = 'uploads/';
            $imgurl = $directory . $imageName;
            $image->move($directory, $imageName);
            $validatedData['image'] = $imgurl;
        }


        $validatedData['Url_slug'] = Str::slug($request->name) . rand(900000, 1000000);
        // dd($validatedData);

        $products = product::create($validatedData);
        return response()->json(['message' => 'products created successfully', 'product' => $products], 200);
    }

    public function getProduct()
    {
        $products = product::all();
        // dd($products);
        return response()->json(['product' => $products], 200);
    }
    public function getSingleProducts($id)
    {
        $products = product::find($id);
        return response()->json(['products' => $products], 200);
    }
    public function updateProducts(Request $request, $id)
    {
        // dd($request->all());
        $products = product::findOrFail($id);

        // Validate incoming request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|',
            'Description' => 'required|',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'Price' => 'required|',
            'Stock_quantity' => 'required|',
            'status' => 'required|',
        ]);
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $imageName = Str::slug($request->name . Carbon::now()->toDateTimeString()) . '.' . $image->getclientOriginalExtension();
            $directory = 'uploads/';
            $imgurl = $directory . $imageName;
            $image->move($directory, $imageName);
            $validatedData['image'] = $imgurl;
        }


        // Update user details
        $products->update($validatedData);

        return response()->json(['message' => 'products updated successfully', 'product' => $products], 200);
    }




    public function deleteproduct($id)
    {
        $products = product::findOrFail($id);
        $products->delete();

        return response()->json(['message' => 'product deleted successfully'], 200);
    }
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
}
