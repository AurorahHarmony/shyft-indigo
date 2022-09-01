<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a list of all users.
     */
    public function index()
    {
        $users = User::all(['id', 'name']);
        return inertia('admin.users.index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
    }

    /**
     * Store a newly created user/
     */
    public function store()
    {
    }

    /**
     * Show a single user
     */
    public function show()
    {
        $user = User::where('id', request()->id)->firstOrFail(['id', 'name', 'username', 'email']);
        return inertia('admin.users.create', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing a user
     */
    public function edit()
    {
    }

    /**
     * Update the specified user
     */
    public function update()
    {
    }

    /**
     * Delete user
     * Note: We will only soft delete.
     */
    public function destroy()
    {
    }
}