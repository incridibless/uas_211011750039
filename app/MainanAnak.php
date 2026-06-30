<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainanAnak extends Model
{
    protected $fillable = [
        'gambar', 'nama_mainan', 'usia_rekomendasi', 'bahan', 'harga'
    ];
}
