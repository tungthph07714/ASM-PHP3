<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\news;
use App\Models\Comment;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Key_words;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\ReplyCommentRequest;
use App\Http\Requests\createKey;
use App\Http\Resources\KeyWords as KeyResource;
use App\Http\Resources\CateResource;

use App\Mail\sendMail;
use Illuminate\Support\Facades\Mail;

class HomePageController extends Controller
{
    /**start list api*/
    public function listCate()
    {
        $category = Category::where('status', 1)->get();
        $arr = [
            'status' => true,
            'message' => "Lấy danh sách thành công",
            'data' => CateResource::collection($category)

        ];
        return response()->json($arr, 201);
    }

    public function listPost()
    {
        $data = Key_words::all();
        $arr = [
            'status' => true,
            'message' => "Lấy danh sách thành công",
            'data' => KeyResource::collection($data)

        ];
        return response()->json($arr, 201);
    }
    public function createKey(createKey $request)
    {
        $input = $request->all();

        $product = Key_words::create($input);
        $arr = [
            'status' => true,
            'message' => "Lưu từ khóa thành công",
            'data' => new KeyResource($product)
        ];
        return response()->json($arr, 201);
    }

    public function detailKey($id)
    {
        $data = Key_words::find($id);
        if (is_null($data)) {
            $arr = [
                'success' => false,
                'message' => 'Không tìm thấy từ khóa',
                'dara' => []
            ];
            return response()->json($arr, 200);
        }

        $arr = [
            'status' => true,
            'message' => "Lấy danh sách thành công",
            'data' => new KeyResource($data)

        ];
        return response()->json($arr, 201);
    }

    public function updatelKey(Request $request, $id)
    {
        $input = $request->all();
        $data = Key_words::find($id);

        $data->name = $input['name'];
        $data->status = $input['status'];
        $data->save();

        $arr = [
            'status' => true,
            'message' => 'Từ khóa cập nhật thành công',
            'data' => new KeyResource($data)
        ];

        return response()->json($arr, 200);
    }

    public function deleteKey($id)
    {
        $data = Key_words::find($id);
        $data->delete();
        $arr = [
            'status' => true,
            'message' => 'Xóa từ khóa thành công',
            'data' => []
        ];
        return response()->json($arr, 200);
    }

    /**
     * end list api
     */

    public function searchPost(Request $request)
    {
        $data = $request->all();
        $post = news::where('status', 1)
            ->where('title', 'like', '%' . $data['search'] . '%')
            ->orWhere('sub_title', 'like', '%' . $data['search'] . '%')
            ->orWhere('comment', 'like', '%' . $data['search'] . '%')
            ->get();
        return view('searchPost', ['data' => $post]);
    }

    public function infomation()
    {
        $user = Auth::user();
        return view('profile.infomation', ['data' => $user]);
    }

    public function changeInfo(Request $request, $id)
    {
        $user = User::find($id);
        $data = $request->all();

        $user->username = $data['username'];
        $user->email = $data['email'];
        $user->save();
        Mail::to('tungthph07714@fpt.edu.vn')->send(new sendMail);
        return redirect()->route('infomation');
    }
    public function listKey()
    {
        return view('keyWords.key');
    }

    public function homePage()
    {

        $newsPost = news::where('status', 1)->get();

        return view('welcome', ['newsPost' => $newsPost]);
    }

    public function detailNews($id)
    {
        $newsPost = news::where('id', $id)->first();
        $comment = Comment::where('news_id', '=', $id)
            ->where('parent_id', '=', 0)
            ->with('user')
            ->with('parent')
            ->get();

        $shareComponent = \Share::page(
            'http://127.0.0.1:8000/detail-news/3',
            'Your share text comes here',
        )
            ->facebook()
            ->twitter()
            ->linkedin()
            ->telegram()
            ->whatsapp()
            ->reddit();

        $user = Auth::user();
        return view('detailNewsPost', ['data' => $newsPost, 'comment' => $comment, 'news_id' => $id, 'shareComponent' => $shareComponent, 'user' => $user]);
    }

    public function addComment(CommentRequest $request, $id)
    {
        $data = $request->all();

        $user = Auth::user();

        $comment = new Comment();
        $comment->news_id = $id;
        $comment->user_id = $user->id;
        $comment->content = $data['content'];
        $comment->parent_id = 0;
        $comment->is_edit = 0;

        $comment->save();

        return redirect()->route('detail-news', $id);
    }

    public function replyComment(ReplyCommentRequest $request, $id)
    {
        $user = Auth::user();
        $data = $request->all();
        $comment = new Comment();
        $comment->news_id = $id;
        $comment->user_id = $user->id;
        $comment->content = $data['content_reply'];
        $comment->parent_id = $data['comment_id'];
        $comment->is_edit = 0;

        $comment->save();

        return redirect()->route('detail-news', $id);
    }

    public function createNewsPost()
    {
        $category = Category::where('status', 1)->get();
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

    public function detailCategory($id)
    {
        $newsPost = news::where('status', 1)->where('category_id', $id)->get();
        return view('detailCategory', ['data' => $newsPost]);
    }
}
