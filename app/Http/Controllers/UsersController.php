<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;

class UsersController extends Controller
{
    public function index(User $users)
    {
        $users = User::all();
        return view('Admin.Users.index', compact('users'));
    }

    public function show($id)
    {
        
    }
}
