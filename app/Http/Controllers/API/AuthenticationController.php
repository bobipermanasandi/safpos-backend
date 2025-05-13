<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends BaseController
{
    public function login(Request $request): JsonResponse
    {
        $loginData = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user) {
            return $this->sendError('Email not found');
        }

        if(!Hash::check($request->password, $user->password)) {
            return $this->sendError('Password is wrong');
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        $data['user'] = $user;
        $data['token'] = $token;

        return $this->sendResponse('User login successfully.', $data);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return $this->sendResponse('User logout successfully.');
    }
}
