<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class LoginController extends Controller
{
    public function dologin(Request $request)
    {
      if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        return redirect()->route('dashboard.index');
      } else {
        return redirect()->route('login.index')->with('message', 'Periksa kembali username dan password anda.');
      }
    }

    public function dologout()
    {
      Auth::logout();
      return redirect()->route('login.index');
    }
}
