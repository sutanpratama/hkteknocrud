<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::latest()->paginate(5);

        return view('berita.index', compact('berita'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'isi' => 'required'
        ]);

        Berita::create($request->all());

        return redirect()->route('berita.index')->with('success', 'Berita Berhasil DiTambah!');
    }

    public function show($id)
    {
        $berita = Berita::findOrFail($id);

        return view('berita.show', compact('berita'));
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);

        return view('berita.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'isi' => 'required'
        ]);

        $berita = Berita::findOrFail($id);
        $berita->judul = $request->judul;
        $berita->penulis = $request->penulis;
        $berita->isi = $request->isi;

        $berita->save();

        return redirect()->route('berita.index')->with('success','Berita Berhasil Diedit!');
    }

    public function destroy($id)
    {
        Berita::findOrFail($id)->delete();

        return redirect()->route('berita.index')->with('success','Berita Berhasil DiHapus!');
    }
}
