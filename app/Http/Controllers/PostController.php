<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Auth;
use App\Post;

class PostController extends Controller
{
    public function createPost(Request $request) {
      $post = new Post();
      $post->author = Auth::user()->username;
      $post->content = $request->input('content');

      if ($request->hasFile('photo')) {
        $path = $request->file('photo')->path();
        $image = file_get_contents($path);
        $base64 = base64_encode($image);
        $post->photo = $base64;
      }

      $post->save();

      return redirect()->route('home');
    }

    public function deletePost(Request $request) {
      $post = Post::find($request->input('id'));
      if($post->author == Auth::user()->username) {
        $post->delete();
        return response()->json(
          ['success' => $request->input('id')]
        );
      }
    }
}
