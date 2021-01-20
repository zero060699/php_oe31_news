<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::where('parent_id', config('number_format.parent_id'))->get();
        $category->load('children');
        $posts = Post::where('status', config('number_status_post.status'))->latest()->paginate(config('number_status_post.paginate_home'));

        return view('website.frontend.index', compact('posts', 'category'));
    }

    public function filterCategory($id)
    {
        $category = Category::findOrFail($id)->load([
            'posts' => function ($query) {
                $query->orderBy('created_at', 'desc')->first();
            }
        ]);
        $posts = Post::where('category_id', $id)->with('category')->latest()->paginate(config('number_status_post.paginate_home'));
        $allCategory = Category::where('parent_id', config('number_format.parent_id'))->get();
        $allCategory->load('children');

        return view('website.frontend.filter_category', compact('posts', 'allCategory', 'category'));
    }

    public function postLike(Request $request)
    {
        $data = $request->all();
        $postId = $request['post_id'];
        $post = Post::findOrFail($postId);
        if (!$post) {

            return null;
        }
        $like = Like::where([
            ['user_id', Auth::id()],
            ['post_id', $postId]
        ])->first();
        if(!$like) {
            $like = Like::create([
                'user_id' => Auth::id(),
                'post_id' => $postId,
                'like' => config('number_format.like'),
            ]);
        }
        else {
            $like->delete();
        }

        return response()->json([
            'status' => true
        ]);
    }

    public function postDisLike(Request $request) {
        $data = $request->all();
        $postId = $request['post_id'];
        $post = Post::findOrFail($postId);
        if (!$post) {

            return null;
        }
        $dislike = Like::where([
            ['user_id', Auth::id()],
            ['post_id', $postId],
        ])->first();
        if(!$dislike) {
            $dislike = Like::create([
                'user_id' => Auth::user()->id,
                'post_id' => $postId,
                'like' => config('number_format.dislike'),
            ]);
        }
        else {
           if ($dislike->like == config('number_format.view')) {
                $dislike->update([
                    'user_id' => Auth::user()->id,
                    'post_id' => $postId,
                    'like' => config('number_format.dislike'),
                ]);
           } else {
               $dislike->delete();
           }
        }

        return response()->json([
            'status' => true
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
