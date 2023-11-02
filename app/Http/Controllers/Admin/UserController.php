<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'user_type' => 'required|string',
        ]);

        // Create a new user
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'user_type' => $request->input('user_type'),
        ]);

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'user_type' => 'required|string',
        ]);

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'user_type' => $request->input('user_type'),
        ]);

        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}


// namespace App\Http\Controllers\Admin;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use App\Models\User;
// use App\Models\MenuLink;
// use Illuminate\Support\Str;

// class UserController extends Controller
// {
//     public function index()
//     {
//         $users = User::all();
//         return view('admin.users.index', compact('users'));
//     }

//     public function create()
//     {
//         $menuLinks = MenuLink::all();
//         return view('admin.users.create', compact('menuLinks'));
//     }

//     public function store(Request $request)
//     {
//         // Validation
//         $request->validate([
//             'name' => 'required|string|max:255',
//             'email' => 'required|email|unique:users',
//             'password' => 'required|string|min:8',
//             'user_type' => 'required|string',
//             'menu_permitted' => 'array',
//         ]);

//         // Create a new user
//         $user = new User([
//             'name' => $request->input('name'),
//             'email' => $request->input('email'),
//             'password' => bcrypt($request->input('password')),
//             'user_type' => $request->input('user_type'),
//             'menu_permitted' => implode(',', $request->input('menu_permitted')),
//         ]);
//         $user->save();

//         return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
//     }

//     public function edit(User $user)
//     {
//         $menuLinks = MenuLink::all();
//         $userMenuPermissions = explode(',', $user->menu_permitted);
//         return view('admin.users.edit', compact('user', 'menuLinks', 'userMenuPermissions'));
//     }

//     public function update(Request $request, User $user)
//     {
//         // Validation
//         $request->validate([
//             'name' => 'required|string|max:255',
//             'email' => 'required|email|unique:users,email,' . $user->id,
//             'user_type' => 'required|string',
//             'menu_permitted' => 'array',
//         ]);

//         // Update user information and menu permissions
//         $user->name = $request->input('name');
//         $user->email = $request->input('email');
//         $user->user_type = $request->input('user_type');
//         $user->menu_permitted = implode(',', $request->input('menu_permitted'));
//         $user->save();

//         return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
//     }

//     public function destroy(User $user)
//     {
//         $user->delete();
//         return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
//     }
// }
