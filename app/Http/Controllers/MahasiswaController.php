<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Mahasiswa.index', [
            'mahasiswas' => Mahasiswa::orderBy('nim', 'asc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Mahasiswa.create', [
            'jurusans' => collect(['Sistem Informasi', 'Informatika', 'Teknik Lingkungan', 'Teknik Industri', 'Teknik Elektro'])
        ]);
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
            'name' => 'required|max:50',
            'nim' => 'required|max:12|unique:mahasiswas',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3',
            'jenis_kelamin' => 'required|in:L,P',
            'jurusan' => 'required',
            'gambar' => 'required|image|max:1024',
            'alamat' => 'required'
        ]);

        $validateData['password'] = Hash::make($request->password);
        $validateData['gambar'] = $request->file('gambar')->store('mahasiswa-img');

        DB::beginTransaction();

        try {
            $user = User::create([
                'name' => $validateData['name'],
                'email' => $validateData['email'],
                'password' => $validateData['password'],
                'jenis_kelamin' => $validateData['jenis_kelamin'],
                'alamat' => $validateData['alamat'],
                'gambar' => $validateData['gambar']
            ]);

            Mahasiswa::create([
                'user_id' => $user->id,
                'nim' => $validateData['nim'],
                'jurusan' => $validateData['jurusan']
            ]);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            abort(403);
        }

        return redirect()->route('mahasiswas.index')->with('success', "Data Mahasiswa $request->name Berhasil ditambah");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return view('Mahasiswa.show', [
            'mahasiswa' => $mahasiswa
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //
    }
}
