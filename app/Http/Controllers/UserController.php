<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return inertia('admin.users.index');
    }
    public function create()
    {
        $user = User::where('id', request()->id)->firstOrFail(['id', 'name', 'username', 'email']);
        return inertia('admin.users.create', [
            'user' => $user,
        ]);
    }
}