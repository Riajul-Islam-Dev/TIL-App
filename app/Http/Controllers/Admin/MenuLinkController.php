<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuLinkController extends Controller
{
    public function index()
    {
        $menuLinks = MenuLink::all();
        return view('admin.menu_links.index', compact('menuLinks'));
    }

    public function create()
    {
        $menuLinks = MenuLink::all();

        return view('admin.menu_links.create', compact('menuLinks'));
    }

    public function store(Request $request)
    {
        $lastMenuLink = MenuLink::orderBy('menu_id', 'desc')->first();
        $lastMenuId = $lastMenuLink ? $lastMenuLink->menu_id : 0;
        $newMenuId = $lastMenuId + 1;

        $rules = [
            'menu_name' => 'required|string|max:255',
            'menu_type' => 'required|in:Top-Nav,Side-Bar',
            'url' => 'required|string',
            'parent_id' => 'nullable|exists:menu_links,id',
        ];

        $messages = [
            'menu_name.required' => 'Menu Name is required.',
            'menu_type.required' => 'Menu Type is required.',
            'url.required' => 'URL is required.',
            'parent_id.exists' => 'Invalid parent menu selected.',
        ];

        $request->validate($rules, $messages);

        MenuLink::create([
            'menu_id' => $newMenuId,
            'menu_name' => $request->input('menu_name'),
            'menu_type' => $request->input('menu_type'),
            'url' => $request->input('url'),
            'parent_id' => $request->input('parent_id'),
        ]);

        return redirect()->route('admin.menu_links.index')->with('success', 'Menu link created successfully');
    }

    public function show(MenuLink $menu_link)
    {
        return view('admin.menu_links.show', compact('menu_link'));
    }

    public function edit(MenuLink $menu_link)
    {
        $menuLinks = MenuLink::all();

        return view('admin.menu_links.edit', compact('menu_link', 'menuLinks'));
    }

    public function update(Request $request, MenuLink $menu_link)
    {
        $request->validate([
            'menu_name' => 'required|string|max:255',
            'menu_type' => 'required|in:Top-Nav,Side-Bar',
            'url' => 'required|string',
            'parent_id' => 'nullable|exists:menu_links,id',
        ]);

        // Update the MenuLink with the provided data
        $menu_link->update([
            'menu_name' => $request->input('menu_name'),
            'menu_type' => $request->input('menu_type'),
            'url' => $request->input('url'),
            'parent_id' => $request->input('parent_id'),
        ]);

        return redirect()->route('admin.menu_links.index')
            ->with('success', 'Menu link updated successfully.');
    }

    public function destroy(MenuLink $menu_link)
    {
        $menu_link->delete();

        return redirect()->route('admin.menu_links.index')
            ->with('success', 'Menu link deleted successfully.');
    }
}
