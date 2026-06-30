@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">Edit Data Mainan Anak</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.mainan.update', $mainan->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <label>Nama Mainan</label>
                            <input type="text" name="nama_mainan" class="form-control @error('nama_mainan') is-invalid @enderror" value="{{ old('nama_mainan', $mainan->nama_mainan) }}" required>
                            @error('nama_mainan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Usia Rekomendasi</label>
                            <input type="text" name="usia_rekomendasi" class="form-control @error('usia_rekomendasi') is-invalid @enderror" value="{{ old('usia_rekomendasi', $mainan->usia_rekomendasi) }}" required>
                            @error('usia_rekomendasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Bahan</label>
                            <input type="text" name="bahan" class="form-control @error('bahan') is-invalid @enderror" value="{{ old('bahan', $mainan->bahan) }}" required>
                            @error('bahan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Harga (Rp)</label>
                            <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga', $mainan->harga) }}" required>
                            @error('harga')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Gambar Mainan</label><br>
                            @if($mainan->gambar)
                                <img src="{{ asset('storage/' . $mainan->gambar) }}" alt="Gambar Saat Ini" width="150" class="mb-2 img-thumbnail">
                            @endif
                            <input type="file" name="gambar" class="form-control-file @error('gambar') is-invalid @enderror" accept="image/*">
                            <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                            @error('gambar')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('admin.mainan.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-info text-white">Update Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
