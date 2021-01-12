<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(config('paginate.page'));

        return view('website.backend.users.list')->with('users', $users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::findOrFail($id);

        return view('website.backend.users.edit')->with('users', $users);
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
        $users = User::findOrFail($id);
        Alert::success('Success', trans('message.ok'));
        $filename = config('image_user.image_user');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = md5(time()) . '.' . $extension;
            $file->move(public_path(config('image.image')), $filename);
            $users->image = $filename;
        }
        $users->update([
            'name' => $request->name,
            'email' => $request->email,
            'banned_until' => $request->banned_until,
            'image' => $filename,
        ]);

        return redirect()->route('users.index');
    }
}
