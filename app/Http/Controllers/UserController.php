<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function create()
    {
        return view('register');
    }

    public function store()     //validate,create user,login user,redrirect to feed
    {
        $attributes=request()->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:4']
        ]);

        $user=User::create($attributes);

        Auth::login($user);

        return redirect('/feed');
    }

    public function login()    //validate,login user,redirect to feed
    {
        $attributes=request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (!Auth::attempt($attributes)){
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials do not match our records.'
            ]);
        }

        request()->session()->regenerate();
        return redirect('/feed');
    }

    public function destroy()   //logout user,redirect to home
    {
        Auth::logout();
        return redirect('/');
    }

}
