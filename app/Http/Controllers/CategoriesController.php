<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    public function createCategories(Request $request)
    {
        //  dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'Parent_cat_id' => 'required|',
           


        ]);

        $validatedData['Url_slug'] = Str::slug($request->name) . rand(900000, 1000000);
        $validatedData['status'] = 0;

        // dd($validatedData);

        $categories = categories::create($validatedData);
        return response()->json(['message' => 'Categories created successfully', 'categorie' => $categories], 201);
    }
    public function getCategories()
    {
        $categories = categories::all();
        return response()->json(['categories' => $categories], 200);
    }
    public function getSinglecategories($id)
    {
        $categories = categories::find($id);
        return response()->json(['categories' => $categories], 200);
    }
    public function updatecategories(Request $request, $id)
    {
        // dd($request->all());
        $categories = categories::findOrFail($id);

        // Validate incoming request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'Parent_cat_id' => 'required|', 
            'status' => 'nullable|',
        ]);

        // Update user details
        $categories->update( $validatedData );
       
        return response()->json(['message' => 'categories updated successfully', 'categories' => $categories], 200);
    }

    public function deletecategories($id)
    {
        $categories = categories::findOrFail($id);
        $categories->delete();

        return response()->json(['message' => 'Product categories deleted successfully'], 200);
    }

}
