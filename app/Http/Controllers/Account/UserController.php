<?php

namespace App\Http\Controllers\Account;

use App\User;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Auth\AuthController;

class UserController extends AuthController
{

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Default field for login form
     *
     * @var string
     */
    protected $username = 'name';

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'nickname' => is_null($data['nickname']) ? $data['name'] : $data['nickname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
