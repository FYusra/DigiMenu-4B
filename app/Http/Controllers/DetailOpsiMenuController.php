<?php

namespace App\Http\Controllers;

use App\Models\DetailOpsi;
use App\Models\DetailOpsiMenu;
use Illuminate\Http\Request;

class DetailOpsiController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'id_opsi'        => 'required|exists:opsi_menu,id_opsi',
            'nama_pilihan'   => 'required|string',
            'tambahan_harga' => 'required|numeric|min:0',
        ]);

        $detail = DetailOpsiMenu::create($request->only(['id_opsi', 'nama_pilihan', 'tambahan_harga']));

        return redirect()->back()->with('success', "Pilihan {$detail->nama_pilihan} berhasil ditambahkan.");
    }

    public function update(Request $request, $id_detail_opsi)
    {
        $request->validate([
            'nama_pilihan'   => 'required|string',
            'tambahan_harga' => 'required|numeric|min:0',
        ]);

        $detail = DetailOpsiMenu::findOrFail($id_detail_opsi);
        $detail->update($request->only(['nama_pilihan', 'tambahan_harga']));

        return redirect()->back()->with('success', "Pilihan {$detail->nama_pilihan} berhasil diperbarui.");
    }

    public function destroy($id_detail_opsi)
    {
        $detail = DetailOpsiMenu::findOrFail($id_detail_opsi);
        $detail->delete();

        return redirect()->back()->with('success', "Pilihan {$detail->nama_pilihan} berhasil dihapus.");
    }
}