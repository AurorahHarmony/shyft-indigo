<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;

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
        return inertia('admin.users.create');
    }

    /**
     * Store a newly created user/
     */
    public function store()
    {
        $formFields = request()->validate([
            'username' => ['required', 'alpha_dash', 'min:3', 'max:15', Rule::unique('users', 'username')],
            'name' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6', 'max:128'],
        ]);

        // Hash password.
        $formFields['password'] = bcrypt($formFields['password']);

        // Create user record.
        $user = User::create($formFields);

        return redirect('/admin/users/' . $user->id);
    }

    /**
     * Show a single user
     */
    public function show()
    {
        $user = User::where('id', request()->id)->firstOrFail(['id', 'name', 'username', 'email']);
        return inertia('admin.users.show', [
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
