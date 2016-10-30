<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\User;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /*Template*/
    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required|min:5'
        ]);
        if (!Auth::attempt($request->only(['email', 'password']))) {
                return redirect()->back()->with('info', 'Your credentionals is not valid');
        }
        return redirect()->route('home');
    }

    /*Template*/
    public function getRegister()
    {
        return view('auth.register');

    }

    public function postRegister(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|unique:users|email|max:255',
            'first-name' => 'required|alpha_dash|max:20',
            'last-name' => 'required|alpha_dash|max:20',
            'password' => 'required|min:5'
        ]);
        User::create([
            'email' => $request->input('email'),
            'first-name' => $request->input('first-name'),
            'last-name' => $request->input('last-name'),
            'password' => bcrypt($request->input('password')),
        ]);
        return redirect()->route('home');
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }

}
