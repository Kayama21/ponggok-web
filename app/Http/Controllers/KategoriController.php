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

    public function updateKategori() {

        return view('updateKategori');
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

    public function update(Request $request, $id)
    {
        $request->validate([
            'kategoriSurat' => 'required',
        ]);

        Kategori::update([
            'kategoriSurat' => $request->kategoriSurat,
        ]);
    }
}
