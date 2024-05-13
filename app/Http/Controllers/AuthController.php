<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function destroy(User $user)
    {
        User::findOrFail($user->id)->delete();
        return redirect()->route('users.index');
    }

    public function signupForm()
    {
        return view('auth.signup');
    }

    public function signup(Request $request)
    {
        $user = new User();
        $user->name = $request->get('name');
        $user->surnames = $request->get('surname');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->phone_number = $request->get('phone_number');
        $user->save();

        Auth::login($user);

        return view('index');
    }

    public function loginForm()
    {
        if (Auth::viaRemember()) {
            return 'Bienvenido de nuevo';
        } else if (Auth::check()){
            return redirect()->route('home, ');
        } else {
            return view('auth.login');
        }
    }

    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');
    $rememberLogin = $request->has('remember');

    if (Auth::attempt($credentials, $rememberLogin)) {
        $request->session()->regenerate();
        return redirect()->route('home')->with('success', '¡Inicio de sesión exitoso!');
    } else {
        return redirect()->route('loginForm')->with('error', 'Error al acceder a la aplicación');
    }
}


    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
