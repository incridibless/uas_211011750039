@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card shadow">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Kelola Data Mainan Anak</h5>
                    <div>
                        <a href="{{ route('admin.mainan.create') }}" class="btn btn-light btn-sm font-weight-bold">
                            + Tambah Data
                        </a>
                        <a href="{{ route('admin.mainan.pdf') }}" class="btn btn-warning btn-sm font-weight-bold ml-2">
                            Cetak PDF
                        </a>
                    </div>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Nama Mainan</th>
                                    <th>Usia Rekomendasi</th>
                                    <th>Bahan</th>
                                    <th>Harga</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($mainans as $key => $mainan)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        @if($mainan->gambar)
                                            <img src="{{ asset('storage/' . $mainan->gambar) }}" alt="{{ $mainan->nama_mainan }}" width="80" class="img-thumbnail">
                                        @else
                                            <span class="text-muted">Tidak ada</span>
                                        @endif
                                    </td>
                                    <td class="font-weight-bold">{{ $mainan->nama_mainan }}</td>
                                    <td>{{ $mainan->usia_rekomendasi }}</td>
                                    <td>{{ $mainan->bahan }}</td>
                                    <td class="text-success font-weight-bold">Rp {{ number_format($mainan->harga, 0, ',', '.') }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.mainan.edit', $mainan->id) }}" class="btn btn-sm btn-info text-white">Edit</a>
                                        <form action="{{ route('admin.mainan.destroy', $mainan->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-4">Belum ada data mainan anak.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
