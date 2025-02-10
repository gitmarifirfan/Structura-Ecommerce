<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile(Request $request) {
        return response()->json([
            'message' => 'Profile retrieved successfully',
            'user' => $request->user()
        ], 200);
    }

    public function updateProfile(Request $request) {
        $request->validate([
            'username' => 'sometimes|string|max:255|unique:users,username,' . $request->user()->id,
            'address' => 'sometimes|string|max:255'
        ]);

        $user = $request->user();
        $user->update($request->only('username', 'address'));

        return response()->json([
            'message' => 'Profile updated successfully',
            'user' => $user
        ], 200);
    }
}
