{{-- @dd($mahasiswas) --}}
@extends('Layouts.main')

@section('container')

<h1 class="h3 mb-4 text-gray-800">Tambah Mahasiswa</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa</h6>
        <a href="{{ route('mahasiswas.index') }}" class="btn btn-primary"><i class="fas fa-fw fa-arrow-circle-left"></i> Kembali</a>
    </div>
    <div class="card-body">
        <form action="{{ route('mahasiswas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="nim">Nim</label>
                    <input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" id="nim" value="{{ old('nim') }}">
                    @error('nim')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="password">password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label class="d-block">Jenis Kelamin</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="L" {{ old('jenis_kelamin') === 'L' ? 'checked' : '' }}>
                    <label class="form-check-label" for="jenis_kelamin">L</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="P" {{ old('jenis_kelamin') === 'P' ? 'checked' : '' }}>
                    <label class="form-check-label" for="jenis_kelamin">P</label>
                </div>
                @error('jenis_kelamin')
                    <p class="text-danger"><small>{{ $message }}</small></p>
                @enderror
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="jurusan">Jurusan</label>
                    <select class="form-control @error('jurusan') is-invalid @enderror" name="jurusan" id="jurusan">
                        @foreach ($jurusans as $jurusan)
                        @if (old('jurusan') === $jurusan)
                        <option value="{{ $jurusan }}" selected>{{ $jurusan }}</option>
                        @else
                        <option value="{{ $jurusan }}">{{ $jurusan }}</option>
                        @endif
                        @endforeach
                    </select>
                    @error('jurusan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="gambar" class="form-label">Upload Gambar</label>
                    <input class="form-control @error('gambar') is-invalid @enderror" type="file" name="gambar" id="gambar">
                    @error('gambar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" rows="3">{{ old('alamat') }}</textarea>
                @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</div>

@endsection
