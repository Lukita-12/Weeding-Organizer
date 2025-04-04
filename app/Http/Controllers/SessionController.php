<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('/auth.login');
    }

    public function store(Request $request)
    {
        // Validate
        $validatedData = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Attemp
        if (! Auth::attempt($validatedData)) {
            throw ValidationException::withMessages([
                'email' => 'Sorry, credentials does not match!'
            ]);
        };

        // Regenerate
        request()->session()->regenerate();

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
        Auth::logout();

        return redirect('/');
    }
}
