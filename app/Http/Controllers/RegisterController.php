<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\users; 

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'full_address' => 'required|string',
            'email' => 'required|string|email|unique:users', // Ensure unique email
            'password' => 'required|string|min:8|confirmed',
            'user_type_id' => 'required|integer',
            'branch_assigned' => 'nullable|integer',
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'birthdate' => $request->birthdate,
            'full_address' => $request->full_address,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type_id' => $request->user_type_id,
            'branch_assigned' => $request->branch_assigned,
        ]);

        // Registration successful! Handle success state (e.g., redirect, confirmation message)
        return redirect()->route('login')->with('success', 'Registration successful!');
    }
}
