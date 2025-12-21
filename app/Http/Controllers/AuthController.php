<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showSignUp()
    {
        return view('auth.signup' , ['pageTitle' => 'SignUp']);
    }
    public function signUp(SignupRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        auth()->login($user);
        return redirect('/');
    }
    public function showLogin()
    {
        return view('auth.login', ['pageTitle' => 'Login']);
    }
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email' , 'password');
        if(auth()->attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect('/');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match records.'
        ])->withInput();
    }
    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }

}
