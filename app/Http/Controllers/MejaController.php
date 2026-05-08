<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use Illuminate\Http\Request;

class MejaController extends Controller
{
    public function index(){
        $meja  = Meja::all();
        return view('meja.index', compact('meja'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_meja' => 'required|integer',
            'kapasitas' => 'required|integer|min:1',
            'status' => 'required',
        ]);

        $meja = Meja::create($request->only(['no_meja', 'kapasitas', 'status']));
        return redirect()->back()->with('success_message', "Meja {$meja->no_meja} berhasil ditambahkan.");
    }

    public function update(Request $request, $id_meja)
    {
        $request->validate([
            'no_meja' => 'required|integer',
            'kapasitas' => 'required|integer|min:1',
            'status' => 'required',
        ]);

        $meja = Meja::findOrFail($id_meja);
        $meja->update($request->only([
            'no_meja', 'kapasitas', 'status'
        ]));

        return redirect()->back()->with('success_message', "Meja {$meja->no_meja} berhasil diperbarui.");

    }

    public function updateStatus(Request $request, $id_meja)
    {
        $request->validate([
            'status_meja' => 'required|in:kosong,terisi,reserved',
        ]);

        $meja = Meja::findOrFail($id_meja);
        $meja->update($request->only(['status_meja']));

        return redirect()->back()->with('success', "Status meja {$meja->nomor_meja} berhasil diperbarui.");
    }

    public function destroy($id_meja)
    {
        $meja = Meja::findOrFail($id_meja);
        $meja->delete();
        return redirect()->back()->with('success_message', "Meja {$meja->no_meja} berhasil dihapus.");
    }
}