<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('public.auth.login');
    }

    public function registerForm()
    {
        return view('public.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        Auth::guard('web')->login($user);

        return redirect('/');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (! Auth::guard('web')->attempt($validated)) {
            return redirect()->back()->withErrors([ // idk you could do that:v
                'message' => 'Email atau password salah.',
            ]);
        }

        return redirect('/');
    }

    public function logout()
    {
        Auth::guard('web')->logout();

        return redirect('/');
    }
}
