<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'email' => [
                'required',
                'email',
                Rule::unique('users'),
            ],
            'password' => 'required|min:8|confirmed',
        ]);

        $existingUser = User::where('email', $request->email)->first();
        if ($existingUser) {
            return back()->withErrors(['email' => 'The email address already exists.'])->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }

    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('auth.login');
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required|min:8',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        }

        return redirect()->route('user.login')->with(['error' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('user.login');
    }
}
