<?php

namespace App\Http\Controllers;

use App\Models\Users;

class UsersController extends Controller
{
    public function index()
    {
        $users = Users::all(); 
        return view('users.index', ['users' => $users]); 
    }

    public function show(Users $user)
    {
        return view('users.show', ['user' => $user]); 
    }

}
