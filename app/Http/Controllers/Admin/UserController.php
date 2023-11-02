<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Company;
use App\Models\MenuLink;
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
        $companies = Company::all();
        $menuLinks = MenuLink::all();
        return view('admin.users.create', ['companies' => $companies, 'menuLinks' => $menuLinks]);
    }

    public function store(Request $request)
    {
        // Validation rules
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'user_type' => 'required|in:Admin,Regular',
            'company_id' => 'required|exists:companies,company_id',
            'password' => 'required|string|min:6',
            'status' => 'required|in:0,1', // Ensure status is 0 or 1
            'menu_permitted' => 'array',
            'menu_permitted.*' => 'exists:menu_links,menu_id',
        ];

        // Custom validation error messages
        $messages = [
            'menu_permitted.*.exists' => 'Invalid menu permission selected.',
        ];

        $request->validate($rules, $messages);

        // Find the latest user_id and extract the increment value
        $latestUser = User::latest('user_id')->first();
        $increment = 1;

        if ($latestUser) {
            $latestUserId = $latestUser->user_id;
            $increment = (int)explode('-', $latestUserId)[1] + 1;
        }

        // Format the user_id
        $formattedUserId = 'u-' . str_pad($increment, 3, '0', STR_PAD_LEFT);

        // Hash the password
        $hashedPassword = Hash::make($request->input('password'));

        // Convert menu_permitted array to a comma-separated string or set it to "1" if empty
        $menu_permitted = implode(',', $request->input('menu_permitted', ['1']));

        // Create the user
        User::create([
            'user_id' => $formattedUserId,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'user_type' => $request->input('user_type'),
            'company_id' => $request->input('company_id'),
            'password' => $hashedPassword, // Hashed password
            'status' => $request->input('status'),
            'menu_permitted' => $menu_permitted,
        ]);

        // You can also handle the menu permissions here if needed.

        return redirect()->route('admin.users.index')->with('success', 'User created successfully');
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
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
