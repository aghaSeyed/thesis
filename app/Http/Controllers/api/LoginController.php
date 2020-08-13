<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers ;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    public function login(Request $request)
    {
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $credentials = $request->only('username' , 'password');

        if(Auth('api')->attempt($credentials)){
            $user =auth('api')->user();
            return [
                'status' => true,
                'message' =>'login successful',
            ];
        }
        $this->incrementLoginAttempts($request);
        return [
            'status' => false,
            'message' =>'login failed'
        ];
    }
}
