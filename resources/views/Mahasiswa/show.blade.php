{{-- @dd($mahasiswa) --}}
@extends('Layouts.main')

@section('container')

<h1 class="h3 mb-4 text-gray-800">Mahasiswa</h1>

<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Detail Mahasiswa</h6>
        <a href="{{ route('mahasiswas.index') }}" class="btn btn-primary"><i class="fas fa-fw fa-arrow-circle-left"></i> Kembali</a>
    </div>
    <div class="card-body">
        <h3>{{ $mahasiswa->user->name }}</h3>
        <p>{{ $mahasiswa->nim }}</p>
        <img src="{{ asset('storage/' . $mahasiswa->user->gambar) }}" alt="" width="200px" height="200px" class="img-thumbnail">
    </div>
</div>

@endsection
