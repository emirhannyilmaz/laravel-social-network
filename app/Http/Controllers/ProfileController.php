<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Follower;

class ProfileController extends Controller
{
    public function updateProfile(Request $request) {
      $user = User::find($request->input('id'));

      $user->fullname = $request->input('fullname');
      $user->username = $request->input('username');
      Auth::user()->username = $request->input('username');
      $user->biography = $request->input('biography');
      if ($request->hasFile('photo')) {
        $path = $request->file('photo')->path();
        $image = file_get_contents($path);
        $base64 = base64_encode($image);
        $user->photo = $base64;
      }

      $user->save();

      return redirect()->route('profile', Auth::user()->username);
    }

    public function follow(Request $request) {
      $follower = new Follower();

      $follower->follower_user = Auth::user()->username;
      $follower->followed_user = $request->input('followed_user');

      $follower->save();

      return response()->json(
        ['success' => $request->input('followed_user')]
      );
    }

    public function unFollow(Request $request) {
      $follower = Follower::where('followed_user', $request->input('unfollowed_user'))->first();

      $follower->delete();

      return response()->json(
        ['success' => $request->input('unfollowed_user')]
      );
    }
}
