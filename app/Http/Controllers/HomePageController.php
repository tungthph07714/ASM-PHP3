<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\news;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{
    public function homePage()
    {

        $newsPost = news::where('status', 1)->get();

        return view('welcome', ['newsPost' => $newsPost]);
    }

    public function detailNews($id)
    {
        $newsPost = news::where('id', $id)->with('comment')->get();
        $comment = Comment::where('news_id', $id)->with('user')->get();

        return view('detailNewsPost', ['data' => $newsPost, 'comment' => $comment, 'news_id' => $id]);
    }

    public function addComment(Request $request, $id)
    {
        $data = $request->all();
        $comment = new Comment();
        $comment->news_id = $id;
        $comment->user_id = 1;
        $comment->content = $data['content'];
        $comment->parent_id = 0;
        $comment->is_edit = 0;

        $comment->save();

        return redirect()->route('detail-news', $id);
    }

    public function createNewsPost()
    {
        $category = Category::all();
        return view('controlPost.createNewsPost', ['category' => $category]);
    }

    public function saveNewsPost(Request $request)
    {
        $user = Auth::user();
        $data = $request->all();
        $news = new news();
        $news->category_id = $data['category_id'];
        $news->author_id = $user->id;
        $news->status = $user->role == 0 ? 1 : 0;
        $news->title = $data['title'];
        $news->sub_title = $data['sub_title'];
        $news->comment = $data['comment'];

        $news->save();
        return redirect()->route('home');
    }
}
