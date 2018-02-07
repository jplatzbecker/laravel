<?php

namespace App\Http\Controllers;

use App\Thread;
use App\User;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->get();

        return view('users.index', compact('users'));
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'id' => auth()->id(),
            'title' => request('title'),
            'avatar' => 'default.png',
            'body' => request('body')
        ]);

        return redirect($user->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thread $thread
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thread $thread
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {

       // $currentUserQuery = User::where('id', '=', Auth::user()->id)->first()->get();
       // $currentUser = $currentUserQuery;

        //return view('users.edit', compact('currentUser'));
        return view('users.edit', [
            'currentUser' => Auth::user()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
           'avatar' => 'required|max:10240'
        ]);

        if($request->hasFile('avatar')){
            $user = Auth::user();
            $avatar = $request->file('avatar');
            $filename = $user->name . '.' . time()."." . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename));

            $user->avatar = $filename;
         $user->save();
            return view('users.edit', [
                'currentUser' => Auth::user()
            ])->with('avatarSuccess', 'Profile updated :)');
       }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
