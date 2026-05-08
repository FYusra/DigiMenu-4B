<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriMenu;

class KategoriMenuController extends Controller
{
    public function index()
    {
        $kategori = KategoriMenu::all();
        return view('kategoriMenu.index', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
           'nama_kategori' => 'required',           
        ]);

        $array = $request->only(['nama_kategori']);
        KategoriMenu::create($array);
        
        return redirect()->back()
            ->with('success_message', 'Kategori berhasil ditambahkan.');
    }
    
    public function update(Request $request, $id_kategori)
    {
        $request->validate([
           'nama_kategori' => 'required',           
        ]);        

        $kategori = KategoriMenu::findOrFail($id_kategori);
        $kategori->update($request->only(['nama_kategori']));

        return redirect()->back()->with('success_message', "Kategori {$kategori->nama_kategori} berhasil diperbarui.");
    }

    public function destroy($id_kategori)
    {
        $kategori = KategoriMenu::findOrFail($id_kategori);
        $kategori->delete();

        return redirect()->back()->with('success_message',  "Kategori {$kategori->nama_kategori} berhasil dihapus.");
    }
}