<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:3',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect('/login')->with('success', 'Registration successful. Please log in.');
    }

    public function login(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $validateData['email'])->first();

        if ($user) {
            if (password_verify($validateData['password'], $user->password)) {
                session(['username' => $user->name]);
                session(['email' => $user->email]);
                session(['user_id' => $user->id]);

                if ($user->role === 'admin') {
                    return redirect('/dashboard');
                } elseif ($user->role === 'user') {
                    return redirect('/hotelier');
                }
            } else {
                return redirect('/login')->withInput()->withErrors(['password' => 'Invalid password']);
            }
        }

        return redirect('/login')->withInput()->withErrors(['email' => 'User not found']);
    }

    public function logout(Request $request)
    {
        Session::forget('user_id');
        return redirect('/login');
    }
}
