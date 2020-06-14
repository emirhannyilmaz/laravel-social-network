<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Follower;
use Auth;

class PageController extends Controller
{
    public function index() {
      return view('guest.index');
    }

    public function home() {
      $id = Auth::user()->username;
      $posts = Post::whereIn('author', function($query) use($id) {
        $query->select('followed_user')->from('followers')->where('follower_user', $id);
      })->orWhere('author', $id)->orderBy('updated_at', 'desc')->get();

      return view('user.home', [
        'posts' => $posts
      ]);
    }

    public function explore() {
      $users = User::all();

      return view('user.explore', [
        'users' => $users
      ]);
    }

    public function profile($username) {
      $user = User::where('username', $username)->first();

      $control = Follower::where('follower_user', Auth::user()->username)->where('followed_user', $username)->first();
      $isFollowing = false;

      if ($control != null) {
        $isFollowing = true;
      }

      $followers = Follower::where('followed_user', $username)->get();
      $following = Follower::where('follower_user', $username)->get();

      if ($user != null) {
        return view('user.profile', [
          'id' => $user->id,
          'fullname' => $user->fullname,
          'username' => $user->username,
          'biography' => $user->biography,
          'photo' => $user->photo,
          'isFollowing' => $isFollowing,
          'followers' => $followers,
          'followings' => $following
        ]);
      }
    }

    public function posts() {
      $posts = Post::where('author', Auth::user()->username)->orderBy('updated_at', 'desc')->get();

      return view('user.posts', [
        'posts' => $posts
      ]);
    }

    public function messages() {
      return view('user.messages');
    }
}
