<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        return view('kategori', compact('kategoris'));
    }

    public function addKategori() {

        return view('addKategori');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategoriSurat' => 'required',
        ]);

        Kategori::create([
            'kategoriSurat' => $request->kategoriSurat,
        ]);

        return redirect('./kategori');
    }


    public function updateKategori($id) {
        $kategoris = Kategori::findorFail($id);

        return view('updateKategori', compact('kategoris'));
    }


    public function update(Request $request, $id)
    {

        $kategoris = Kategori::find($id);

        $request->validate([
            'kategoriSurat' => 'required',
        ]);

        $kategoris->update([
            'kategoriSurat' => $request->kategoriSurat,
        ]);

        return redirect('./kategori');
    }

    public function destroy($id){
        $kategoris = Kategori::find($id);

        $kategoris->delete();
        
        return back();
    }
}
