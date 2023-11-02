<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login()
    {
        return view('users.login');
    }

    public function register()
    {
        return view('users.register');
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|max:255',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = strtolower($request->input('email'));
        $user->password = $request->input('password');
        $user->save();

        return redirect()->route('user.login')->with('message', 'Usuario creado satisfactoriamente!');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|max:255',
            'password' => 'required|max:255',
        ]);

        $user = User::where('email', strtolower($request->input('email')))->first();

        if ($user && Hash::check($request->input('password'), $user->password)) {
            Auth::login($user);
            $request->session()->put('user', $user);
            return redirect()->route('books.index');
        } else {
            return redirect()->route('user.login')->with('message', 'Usuario o contraseña incorrectos!');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->forget('user');
        return redirect()->route('user.login');
    }

    public function profile(Request $request, User $user = null)
    {
        if ($user) {
            $user = User::find($user->id);
        } else {
            $user = Auth::user();
        }

        return view('users.profile', [
            'user' => $user
        ]);
    }
}
