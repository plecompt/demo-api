<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController
{
    // Return all the users
    public function getUsers()
    {
        $users = User::all();

        if ($users->isEmpty()) {
            return response()->json(['message' => 'No users in database'], 404);
        }

        return response()->json(User::all());
    }
    
    // Return user for given $id
    public function getUser($id)
    {
        $user = User::find($id);
        
        if (!$user) {
            return response()->json(['message' => "No user found with id: $id"], 404);
        }
        
        return response()->json($user);
    }

    // Add the given user in db
    public function addUser(Request $request)
    {
        // Checking datas
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);
        
        // Hashing password with bcrypt
        $validated['password'] = bcrypt($validated['password']);
        
        // Adding user to db
        $user = User::create($validated);
        
        // Code 201 = Created
        return response()->json($user, 201);
    }

    // Return all the users with passwords
    public function getUsersWithPasswords()
    {
        $users = User::all();

        if ($users->isEmpty()) {
            return response()->json(['message' => 'No users in database'], 404);
        }

        return response()->json(User::all()->makeVisible(['password']));
    }
}
