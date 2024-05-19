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
        $validatedData['status'] = 0;

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




    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(['message' => 'Product deleted successfully'], 200);
    }
 
}
