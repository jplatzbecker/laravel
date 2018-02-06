<?php

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $users = User::latest()->get();

        return view('users.index', compact('users'));
    }
}
