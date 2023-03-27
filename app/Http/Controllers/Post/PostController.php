<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\news;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function listPost()
    {
        $user = Auth::user();
        if ($user->role == 0) {
            $post = news::where('status', '!=', 0)->with('user')->with('category')->get();
        } else {
            $post = news::where('author_id', '=', $user->id)->with('user')->with('category')->get();
        }
        return view('post.post', ['post' => $post, 'user' => $user]);
    }
    public function removePost($id)
    {

        $post = news::find($id);
        $post->status = 2;
        $post->update();
        return redirect()->route('listPost');
    }
    public function pushPost($id)
    {

        $post = news::find($id);
        $post->status = 1;
        $post->update();
        return redirect()->route('listPost');
    }
}
