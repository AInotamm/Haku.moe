<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Default validate word
     *
     * @var string
     * */
    protected $username = "name";

    public function attempt(Request $request)
    {
        dd($this->login($request));
    }



}
