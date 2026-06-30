@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Tambah Data Mainan Anak</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.mainan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group">
                            <label>Nama Mainan</label>
                            <input type="text" name="nama_mainan" class="form-control @error('nama_mainan') is-invalid @enderror" value="{{ old('nama_mainan') }}" required>
                            @error('nama_mainan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Usia Rekomendasi</label>
                            <input type="text" name="usia_rekomendasi" class="form-control @error('usia_rekomendasi') is-invalid @enderror" value="{{ old('usia_rekomendasi') }}" placeholder="Contoh: 3-5 Tahun" required>
                            @error('usia_rekomendasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Bahan</label>
                            <input type="text" name="bahan" class="form-control @error('bahan') is-invalid @enderror" value="{{ old('bahan') }}" placeholder="Contoh: Plastik, Kayu" required>
                            @error('bahan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Harga (Rp)</label>
                            <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') }}" required>
                            @error('harga')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Gambar Mainan</label>
                            <input type="file" name="gambar" class="form-control-file @error('gambar') is-invalid @enderror" required accept="image/*">
                            @error('gambar')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('admin.mainan.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-success">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
