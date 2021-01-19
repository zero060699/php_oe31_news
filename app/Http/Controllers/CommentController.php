<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Post $post)
    {
        return response()->json($post->comments()->with('user')->latest()->get());
    }

    public function store(Request $request)
    {
        $post = Post::find($request->post_id);
        $data = [
            'message' => trans("message.error"),
        ];
        if (empty($post)) {
            return json_encode($data);
        }
        $check = Comment::create([
            'content' => $request->content,
            'post_id' => $request->post_id,
            'user_id' => Auth::id(),
        ]);
        if ($check) {
            $data['message'] = trans("message.success");
            $data['content'] = $request->content;
            $data['username'] = Auth::user()->name;
            $data['image'] = Auth::user()->image;
            $data['created_at'] = $check->created_at;

            return view ('website.frontend.ajax_comment', compact('data'));
        }

        return response()->json([
            'data' => $data
        ]);
    }
}
