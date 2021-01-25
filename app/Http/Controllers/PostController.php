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
use App\Repositories\Post\PostRepository;
use App\Repositories\Post\PostRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Category\CategoryRepository;

class PostController extends Controller
{
    protected $postRepo;
    protected $categoryRepo;

    public function __construct(PostRepositoryInterface $postRepo, CategoryRepositoryInterface $categoryRepo)
    {
        $this->middleware('admin')->except(['show', 'search']);
        $this->middleware('auth')->except('show');
        $this->postRepo = $postRepo;
        $this->categoryRepo = $categoryRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->postRepo->getPendingPost();

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
        $post = $this->postRepo->find($id);

        if ($post->status == config('number_status_post.status_request')) {
            abort(Response::HTTP_NOT_FOUND);
        }
        $post->load('comments.user');
        $category = $this->categoryRepo->loadParent();
        $post->update([
            'view' => $post->view + config('number_format.view'),
        ]);
        $like = $post->likes->where('like', config('number_format.view'))->count();

        return view('website.frontend.detail', compact('post', 'category'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $category = $this->categoryRepo->loadParent();
        $category->load('children');
        $posts = Post::where('title', 'LIKE', '%' .$search. '%')->with('category')->paginate(config('number_status_post.paginate_home'));

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
        $post = $this->postRepo->find($id);
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
