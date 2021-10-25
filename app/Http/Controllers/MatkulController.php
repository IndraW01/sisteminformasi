<?php

namespace App\Http\Controllers;

use App\Models\Matkul;
use Illuminate\Http\Request;

class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Matkul.index', [
            'matkuls' => Matkul::orderBy('nama_matkul', 'asc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Matkul.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_matkul' => 'required|max:50',
            'kode_matkul' => 'required|unique:matkuls',
            'sks' => 'required|numeric'
        ]);

        Matkul::create($validateData);

        return redirect()->route('matkuls.index')->with('success', 'Data Matkul ' . $validateData['nama_matkul']. ' Berhasil ditambah' );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matkul  $matkul
     * @return \Illuminate\Http\Response
     */
    public function edit(Matkul $matkul)
    {
        return view('Matkul.edit', [
            'matkul' => $matkul
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Matkul  $matkul
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matkul $matkul)
    {
        $validateData = $request->validate([
            'nama_matkul' => 'required|max:50',
            'kode_matkul' => 'required|unique:matkuls,kode_matkul,' . $matkul->id,
            'sks' => 'required|numeric'
        ]);

        Matkul::where('id', $matkul->id)->update($validateData);

        return redirect()->route('matkuls.index')->with('success', 'Data Matkul ' . $validateData['nama_matkul']. ' Berhasil diubah' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matkul  $matkul
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matkul $matkul)
    {
        Matkul::destroy($matkul->id);

        return redirect()->route('matkuls.index')->with('success', 'Data Matkul ' . $matkul->nama_matkul . ' Berhasil dihapus' );
    }
}
