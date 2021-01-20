<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestWriter;
use App\Models\Role;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class RequestAuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requestWriter = RequestWriter::with('role')
            ->where('role_id', config('number_status_post.user'))
            ->where('status', config('number_status_post.status_request'))->latest()->paginate(config('number_status_post.paginate_home'));

        return view('website.backend.author_request.pending_request', compact('requestWriter'));
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
        $post = RequestWriter::findOrFail($id);
        $post->update($request->only('role_id'));
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
