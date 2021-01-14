<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Http\Response;
use App\Models\Category;
use App\Models\User;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('author')->where('status', config('number_status_post.status'))->latest()->get();

        return view('website.backend.post.index', compact('posts'));
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
        $post = Post::findOrFail($id);

        if ($post->status == config('number_status_post.status_request')) {
            abort(Response::HTTP_NOT_FOUND);
        }
        $post->load('comments.user');
        $category = Category::where('parent_id', config('number_format.parent_id'))->with('children')->get();
        $post->update([
            'view' => $post->view + config('number_format.view'),
        ]);
        $like = $post->likes->where('like', config('number_format.view'))->count();

        return view('website.frontend.detail', compact('post', 'category'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $category = Category::where('parent_id', config('number_format.parent_id'))->get();
        $category->load('children');
        $posts = Post::where('title', 'LIKE', '%' .$search. '%')->with('category')->get();

        return view('website.frontend.search', compact('posts', 'category', 'search'));
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
        $post = Post::findOrFail($id);
        $post->update($request->only('status'));
        Alert::success(trans('message.success'), trans('message.successfully'));

        return redirect()->back();
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
