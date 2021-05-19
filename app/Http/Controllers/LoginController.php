<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * ログイン画面を表示する
     *
     * @return view
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * main画面を表示する
     *
     * @return view
     */
    public function main()
    {
        return view('menu.main');
    }

}
