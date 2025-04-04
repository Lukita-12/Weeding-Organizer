<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('/auth.register');
    }

    public function store(Request $request)
    {
        // Validate
        $validatedData = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'max:254'],
            'email_verified_at' => ['nullable', 'date'],
            'password' => ['required', Password::min(8), 'confirmed'], // password_confirmation
            'remember_token' => ['nullable'],
        ]);

        // Create
        $user = User::create($validatedData);

        // log in
        Auth::login($user);

        // Redirect
        return redirect('/');
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        //
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        //
    }
}
