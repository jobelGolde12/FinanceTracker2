<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|unique:users,email',
            'name' => 'required|unique:users,name',
            'password' => 'required|min:8',
        ]);

        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);

        return response()->json($user, 201);
    }

    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'name' => 'required|string',
                'password' => 'required|string',
            ]);

            if (Auth::attempt($credentials)) {
                $user = Auth::user();

                if ($user) {
                    Log::info('User ID: ' . $user->id);
                    return response()->json(['message' => 'Login successful', 'user' => $user], 200);
                } else {
                    return response()->json(['message' => 'User not found'], 404);
                }
            } else {
                return response()->json(['message' => 'Invalid credentials'], 401);
            }
        } catch (\Exception $e) {
            Log::error('Login error: ' . $e->getMessage());
            return response()->json(['message' => 'Internal server error'], 500);
        }
    }

    public function getTheUser()
    {
        $data = User::all();
        return response()->json($data);
    }


    public function getTheUsername(Request $request)
    {
        $request->validate([
            'id' => 'required|integer'
        ]);
        $user = User::find($request->id);

        if($user){
        return response()->json(['username' => $user->name], 200);
        }else{
        return response()->json(['error' => 'user not found'], 404);

        }
    }
}
