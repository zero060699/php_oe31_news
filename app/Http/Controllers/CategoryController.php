<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Auth\Access\Gate;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Category::where('parent_id', config('number_format.parent_id'))->paginate(config('number_status_post.paginate_home'));

        return view('website.backend.category.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_id', config('number_format.parent_id'))->get();

        return view('website.backend.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category;
        $category->create($request->only(['name', 'parent_id']));
        Alert::success(trans('message.success'), trans('messsage.successfully'));

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);

        if ($category->parent_id === config('number_format.parent_id')) {
            $category->load('children');

            return view('website.backend.category.show', compact('category'));
        }

        abort(Response::HTTP_NOT_FOUND);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categoryList = Category::all();

        if ($category->parent_id === config('number_format.parent_id')) {
            $category->load('children');

            return view('website.backend.category.update', compact('category', 'categoryList'));
        }

        return view('website.backend.category.update', compact('category', 'categoryList'));
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
        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
        ]);
        Alert::success(trans('message.success'), trans('messsage.edit_successfully'));

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->load('children');

        if ($category->children->count()) {
            foreach ($category->children as $child) {
                $child->delete();
            }
        }
        $category->delete();
        Alert::success(trans('message.success'), trans('messsage.delete_successfully'));

        return redirect()->back();
    }
}
