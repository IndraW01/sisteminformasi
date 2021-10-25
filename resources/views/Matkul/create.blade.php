{{-- @dd($mahasiswas) --}}
@extends('Layouts.main')

@section('container')

<h1 class="h3 mb-4 text-gray-800">Tambah Matkul</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Data Matkul</h6>
        <a href="{{ route('matkuls.index') }}" class="btn btn-primary"><i class="fas fa-fw fa-arrow-circle-left"></i> Kembali</a>
    </div>
    <div class="card-body">
        <form action="{{ route('matkuls.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_matkul">Nama Matkul</label>
                <input type="text" class="form-control @error('nama_matkul') is-invalid @enderror" name="nama_matkul" id="nama_matkul" value="{{ old('nama_matkul') }}">
                @error('nama_matkul')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="sks">SKS</label>
                    <input type="number" pattern="[0-9]" class="form-control @error('sks') is-invalid @enderror" name="sks" id="sks" value="{{ old('sks') }}">
                    @error('sks')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="kode_matkul">Kode Matkul</label>
                    <input type="text" class="form-control @error('kode_matkul') is-invalid @enderror" name="kode_matkul" id="kode_matkul" value="{{ old('kode_matkul') }}">
                    @error('kode_matkul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</div>

@endsection
