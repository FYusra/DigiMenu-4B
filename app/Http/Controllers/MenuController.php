<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menu = Menu::all();
        return view('menu.index', compact('menu'));   
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'id_kategori' => 'required',
            'nama_item' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'required',
            'gambar' => 'required|img',
            'status' => 'required|'
        ]);

        Menu::create($request->only([
            'id_kategori',
            'nama_item',
            'harga',
            'deskripsi',
            'gambar',
            'status'
        ]));

        return redirect()->back()->with('success_message', 'Menu berhasil ditambahkan.');
    }

    public function update(Request $request, $id_menu)
    {
        $request->validate([
            'id_kategori' => 'required',
            'nama_item' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'required',
            'gambar' => 'required|img',
            'status' => 'required|boolean'
        ]);

        $menu = Menu::findOrFail($id_menu);
        $menu->update($request->only([
            'id_kategori',
            'nama_item',
            'harga',
            'deskripsi',
            'gambar',
            'status'
        ]));

        return redirect()->back()->with('success_message', "Menu {$menu->nama_item} berhasil diperbarui.");
        }
        
        public function updateStatus(Request $request, $id_menu){
        $request->validate([
            'status' => 'required'
        ]);
        $menu = Menu::findOrFail($id_menu);
        $menu->update($request->only('status'));
        return redirect()->back()->with('success_message', "Status menu {$menu->nama_item} berhasil diperbarui.");
        }
        
        public function destroy($id_menu)
        {
            $menu = Menu::findOrFail($id_menu);
            $menu->delete();
            return redirect()->back()->with('success_message', "Menu {$menu->nama_item} berhasil dihapus.");
    }
    
}