<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required', 'min:8'],
        ]);

        if (Auth::attempt($credentials)) {
            return response()->json([
                'user' => UserResource::make(Auth::user()),
                'token' => Auth::user()->createToken('todo-api')->plainTextToken
            ]);
        }

        return response()->json([
            'error' => 'Your credentials are not match'
        ], 400);
    }
}
