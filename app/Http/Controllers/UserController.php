<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function createUser(Request $request)
    {
        //  dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'phone' => 'required|string|min:9',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'status' => 0,
            'password' => bcrypt($validatedData['password']),

        ]);

       
        return response()->json(['message' => 'User created successfully', 'user' => $user], 201);
    }

    public function getUsers()
    {
        $users = User::all();
        return response()->json(['users' => $users], 200);
    }
    public function getSingleUser($id)
    {
        $user = User::find($id);
        return response()->json(['user' => $user], 200);
    }

    public function updateUser(Request $request, $id)
    {
        // dd($request->all());
        $user = User::findOrFail($id);

        // Validate incoming request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'status' => 'required|', 
            'phone' => 'required|string|min:9',
        ]);

        // Update user details
        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'status' => $validatedData['status'],
        ]);
       
        return response()->json(['message' => 'User updated successfully', 'user' => $user], 200);
    }
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'User deleted successfully'], 200);
    }
}
