<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\news;

class ControlPostController extends Controller
{
    public function browsePost()
    {

        $post = news::where('status', 0)->get();
        return view('controlPost.browsePost', ['post' => $post]);
    }

    public function upgratePost(Request $request, $id)
    {
        $data = $request->all();
        $news = news::find($id);
        $news->status = $data['status'];

        $news->save();
        return redirect()->route('browse-post');
    }
}
