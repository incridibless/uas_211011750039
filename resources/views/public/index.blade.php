@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-4">
        <div class="col-md-12 text-center">
            <h1 class="display-4 font-weight-bold" style="color: #4a90e2;">Koleksi Mainan Anak</h1>
            <p class="lead text-muted">Temukan berbagai mainan edukatif dan menyenangkan untuk si kecil!</p>
        </div>
    </div>

    <div class="row">
        @forelse($mainans as $mainan)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm" style="border-radius: 15px; overflow: hidden; transition: transform 0.3s; cursor: pointer;" onmouseover="this.style.transform='scale(1.03)'" onmouseout="this.style.transform='scale(1)'">
                    @if($mainan->gambar)
                        <img src="{{ asset('storage/' . $mainan->gambar) }}" class="card-img-top" alt="{{ $mainan->nama_mainan }}" style="height: 250px; object-fit: cover;">
                    @else
                        <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 250px;">
                            <span>Tidak Ada Gambar</span>
                        </div>
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title font-weight-bold" style="color: #333;">{{ $mainan->nama_mainan }}</h5>
                        <p class="card-text text-muted mb-1"><i class="fa fa-info-circle"></i> Usia: {{ $mainan->usia_rekomendasi }}</p>
                        <p class="card-text text-muted mb-3"><i class="fa fa-cube"></i> Bahan: {{ $mainan->bahan }}</p>
                        <div class="mt-auto">
                            <h4 class="text-success font-weight-bold">Rp {{ number_format($mainan->harga, 0, ',', '.') }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-md-12 text-center">
                <div class="alert alert-info" style="border-radius: 10px;">
                    <h4 class="mb-0">Belum ada data mainan anak.</h4>
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection
