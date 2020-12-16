<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserLoginController extends Controller
{
  public function getLogin()
  {
    return view('auth.user-login');
  }

  public function postLogin(Request $request)
  {

      // Validate the form data
    $this->validate($request, [
      'email' => 'required|email',
      'password' => 'required'
    ]);
      if(Auth::attempt($request->only('email','password'))){
        return redirect()->route('user-dashboard');
      }

      return back()->withErrors(['email' => 'Email atau Kata Sandi Salah!']);

      // if (Auth::guard('users')->attempt(['email' => $request->email, 'password' => $request->password, $request->remember])) {
      //   return redirect()->intended(route('user.dashboard'));
      // }
      // return redirect()->back()->with($request->only('email','remember'));

  
  }

  public function logout(Request $request)
  {
   
    // Auth::guard('users')->logout();
    Auth::logout();
    return redirect('/');
    
  }
}