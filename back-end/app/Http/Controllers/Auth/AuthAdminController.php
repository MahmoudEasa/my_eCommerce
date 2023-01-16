<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin', ['expect'=>['login']]);
    }

    public function login()
    {
        // Validation


        // Login
        $credentials = request(['email', 'password']);
        $token = auth('admin')->attempt($credentials);

        if(! $token) {
            return returnError('401', 'Unauthorized');
        }
        $user = auth('admin')->user();
        return returnData(['token' => $token , 'user' => $user], 'Successfully logged in');
    }

    public function logout()
    {
        auth('admin')->logout();
        return returnSuccessMessage('Successfully logged out');
    }
}