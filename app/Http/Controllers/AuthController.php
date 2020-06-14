<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\User;

class AuthController extends Controller
{
    public function login(Request $request) {
      $this->validate($request, [
        'username' => 'required',
        'password' => 'required'
      ]);

      $user_data = array(
        'username' => $request->input('username'),
        'password' => $request->input('password')
      );

      if (Auth::attempt($user_data)) {
        return redirect()->route('home');
      } else {
        return back();
      }
    }

    public function logout() {
      Auth::logout();
      return redirect()->route('index');
    }

    public function register(Request $request) {
      $user = new User();

      $user->fullname = $request->input('fullname');
      $user->username = $request->input('username');
      $user->email = $request->input('email');
      $user->password = bcrypt($request->input('password'));
      $path = public_path('img/user.png');
      $image = file_get_contents($path);
      $base64 = base64_encode($image);
      $user->photo = $base64;

      $user->save();

      return redirect()->route('index');
    }
}
