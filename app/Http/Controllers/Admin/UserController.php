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

        $messages = [
            'menu_permitted.*.exists' => 'Invalid menu permission selected.',
        ];

        $request->validate($rules, $messages);

        $latestUser = User::latest('user_id')->first();
        $increment = 1;

        if ($latestUser) {
            $latestUserId = $latestUser->user_id;
            $increment = (int)explode('-', $latestUserId)[1] + 1;
        }

        $formattedUserId = 'u-' . str_pad($increment, 3, '0', STR_PAD_LEFT);

        $hashedPassword = Hash::make($request->input('password'));

        $menu_permitted = implode(',', $request->input('menu_permitted', ['1']));

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

        return redirect()->route('admin.users.index')->with('success', 'User created successfully');
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $companies = Company::all();
        $menuLinks = MenuLink::all();

        return view('admin.users.edit', compact('user', 'companies', 'menuLinks'));
    }

    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'user_type' => 'required|string',
            'company_id' => 'required|exists:companies,company_id',
            'status' => 'required|in:0,1',
            'menu_permitted' => 'array',
            'menu_permitted.*' => 'exists:menu_links,menu_id',
        ];

        $messages = [
            'menu_permitted.*.exists' => 'Invalid menu permission selected.',
        ];

        if ($request->input('password') != null) {
            $rules['password'] = 'string|min:6';
        }

        $request->validate($rules, $messages);

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'user_type' => $request->input('user_type'),
            'company_id' => $request->input('company_id'),
            'status' => $request->input('status'),
        ];

        if ($request->has('password')) {
            $data['password'] = bcrypt($request->input('password'));
        }

        $data['menu_permitted'] = implode(',', $request->input('menu_permitted', ['1']));

        $user->update($data);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
