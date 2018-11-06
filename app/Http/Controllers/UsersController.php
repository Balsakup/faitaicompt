<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\LoginRequest;
use App\Http\Requests\Users\StoreRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register()
    {
        return view('users.register');
    }

    public function store(StoreRequest $request)
    {
        if ($user = User::create($request->only([ 'name', 'email', 'password' ]))) {
            Auth::guard()->login($user);
            return redirect()->route('pages.index')->with('success', 'Vous êtes maintenant connecté');
        }

        return redirect()->route('users.register')->with('danger', 'Une erreur est survenue');
    }

    public function login()
    {
        return view('users.login');
    }

    public function authenticate(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('pages.index')->with('success', 'Vous êtes maintenant connecté');
        }

        return redirect()->route('users.login')->with('danger', 'Une erreur est survenue');
    }
}
