<?php

namespace App\Http\Controllers;

use App\Models\OpsiMenu;
use Illuminate\Http\Request;

class OpsiMenuController extends Controller
{
    // public function index()
    // {
    //     $opsi = OpsiMenu::all();
    //     return view('opsiMenu.index', compact('opsiMenu'));
    // }

    public function store(Request $request)
    {
        $request->validate([
           'id_menu' => 'required|integer', 
           'nama_opsi' => 'string|required'          
        ]);

        $array = $request->only(['id_menu', 'nama_opsi']);
        OpsiMenu::create($array);
        
        return redirect()->back()
            ->with('success_message', 'Opsi menu berhasil ditambahkan.');
    }
    
    public function update(Request $request, $id_opsi)
    {
        $request->validate([
           'id_menu' => 'required|integer', 
           'nama_opsi' => 'string|required'          
        ]);

        $opsi = OpsiMenu::findOrFail($id_opsi);
        $opsi->update($request->only(['id_menu', 'nama_kategori']));

        return redirect()->back()->with('success_message', "Opsi menu {$opsi->nama_opsi} berhasil diperbarui.");
    }

    public function destroy($id_opsi)
    {
        $opsi = OpsiMenu::findOrFail($id_opsi);
        $opsi->delete();

        return redirect()->back()->with('success_message',  "Opsi menu {$opsi->nama_kategori} berhasil dihapus.");
    }
}