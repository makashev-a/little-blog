<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view('pages.register');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $user = User::add($request->all());
        $user->generatePassword($request->get('password'));

        return redirect('/login');
    }

    public function loginForm()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $validator->validateWithBag('login');

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator, 'login');
        }

        if (Auth::attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ])) {
            if (User::checkForBan($request->get('email'))) {
                Auth::logout();
                return redirect()->back()->with('ban', 'You are banned');
            }
            return redirect('/');
        }

        return redirect()
            ->back()
            ->with('login_error', 'Wrong login or password')
            ->withInput($request->except('password'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
