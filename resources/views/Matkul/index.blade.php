@extends('Layouts.main');

@section('container')

<h1 class="h3 mb-4 text-gray-800">Mahasiswa</h1>

@if (session()->has('success'))
<div class="row mb-3">
    <div class="col-md-12">
        @component('Partials.alert')
            {{ session()->get('success') }}
        @endcomponent
    </div>
</div>
@endif

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Data Matkul</h6>
        <a href="{{ route('matkuls.create') }}" class="btn btn-primary"><i class="fas fa-fw fa-plus-circle"></i> Tambah</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Matkul</th>
                        <th>Nama Matkul</th>
                        <th>SKS</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($matkuls as $matkul)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $matkul->kode_matkul }}</td>
                        <td>{{ $matkul->nama_matkul }}</td>
                        <td>{{ $matkul->sks }}</td>
                        <td>
                            <a href="{{ route('matkuls.edit', ['matkul' => $matkul->kode_matkul]) }}" class="badge bg-warning"><i class="fas fa-fw fa-pen fs-5"></i></a>
                            <form action="{{ route('matkuls.destroy', ['matkul' => $matkul->kode_matkul]) }}" class="d-inline" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Yakin Menghapus? ')"><i class="fas fa-fw fa-trash-alt fs-5"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Daftar Matkul Kosong</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
