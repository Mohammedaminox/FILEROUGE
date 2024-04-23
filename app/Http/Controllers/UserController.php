<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all()->where('role','user');
        return view('users',[
            'users' => $users,
        ]);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')
            ->with('successDestroy', 'User deleted successfully');
    }
}
