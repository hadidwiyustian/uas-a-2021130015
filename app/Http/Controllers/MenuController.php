<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    // Menampilkan semua menu
    public function index()
    {
        $menus = Menu::all();
        return view('menus.index', ['menus' => $menus]);
    }

    // Menampilkan form tambah menu
    public function create()
    {
        return view('menus.create');
    }

    // Menyimpan menu baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|size:6|unique:menus',
            'nama' => 'required|string',
            'rekomendasi' => 'required|boolean',
            'harga' => 'required|numeric|min:0',
            'kategori' => 'required|string',
        ]);

        Menu::create($request->all());
        return redirect()->route('menus.index')->with('success', 'Menu created successfully!');
    }

    // Menampilkan detail menu
    public function show(Menu $menu)
    {
        return view('menus.show', ['menu' => $menu]);
    }

    // Menampilkan form edit menu
    public function edit(Menu $menu)
    {
        return view('menus.edit', ['menu' => $menu]);
    }

    // Mengupdate menu ke database
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'nama' => 'required|string',
            'rekomendasi' => 'required|boolean',
            'harga' => 'required|numeric|min:0',
            'kategori' => 'required|string',
        ]);

        $menu->update($request->all());
        return redirect()->route('menus.index')->with('success', 'Menu updated successfully!');
    }

    // Menghapus menu dari database
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menus.index')->with('success', 'Menu deleted successfully!');
    }
}
