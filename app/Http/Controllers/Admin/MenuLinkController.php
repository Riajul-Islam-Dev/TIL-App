<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuLink;
use Illuminate\Http\Request;

class MenuLinkController extends Controller
{
    public function index()
    {
        $menuLinks = MenuLink::all();
        return view('admin.menu_links.index', compact('menuLinks'));
    }

    public function create()
    {
        return view('admin.menu_links.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|unique:menu_links',
            'menu_name' => 'required|unique:menu_links',
            'url' => 'required|unique:menu_links',
        ]);

        MenuLink::create($request->all());

        return redirect()->route('admin.menu_links.index')
            ->with('success', 'Menu link created successfully.');
    }

    public function show(MenuLink $menu_link)
    {
        return view('admin.menu_links.show', compact('menu_link'));
    }

    public function edit(MenuLink $menu_link)
    {
        return view('admin.menu_links.edit', compact('menu_link'));
    }

    public function update(Request $request, MenuLink $menu_link)
    {
        $request->validate([
            'menu_id' => 'required|unique:menu_links,menu_id,' . $menu_link->id,
            'menu_name' => 'required|unique:menu_links,menu_name,' . $menu_link->id,
            'url' => 'required|unique:menu_links,url,' . $menu_link->id,
        ]);

        $menu_link->update($request->all());

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
