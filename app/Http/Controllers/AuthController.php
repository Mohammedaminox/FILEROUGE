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
        
        // Find the user by email
        $user = User::where('email', $validateData['email'])->first();
        
        if ($user) {
            // Verify password
            if (password_verify($validateData['password'], $user->password)) {
                // Set session data
                session(['username' => $user->name]);
                session(['email' => $user->email]);
                session(['user_id' => $user->id]);
                
                // Redirect based on user role
                if ($user->role === 'admin') {
                    return redirect('/dashboard');
                } elseif ($user->role === 'user') {
                    return redirect('/hotelier');
                }
            } else {
                // Incorrect password
                return redirect('/login')->withErrors(['password' => 'Invalid password']);
            }
        }
        
        // User not found
        return redirect('/login')->withErrors(['email' => 'User not found']);
    }
    

    public function logout(Request $request)
    {
        Session::forget('user');
        return redirect('/login');
    }
}
