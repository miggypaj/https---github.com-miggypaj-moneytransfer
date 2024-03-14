<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
  public function login(Request $request)
  {
    $this->validate($request, [
      'email' => 'required|string|email',
      'password' => 'required|string',
    ]);

    // Attempt login using email and password
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
      // Login successful! Redirect to intended route or dashboard
      return redirect()->intended('dashboard'); // Replace with your intended route
    }

    // Login failed, return error message
    return back()->withErrors(['email' => 'Invalid login credentials']);
  }
}
