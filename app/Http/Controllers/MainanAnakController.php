<?php

namespace App\Http\Controllers;

use App\MainanAnak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;

class MainanAnakController extends Controller
{
    public function index()
    {
        $mainans = MainanAnak::latest()->get();
        return view('admin.mainan.index', compact('mainans'));
    }

    public function create()
    {
        return view('admin.mainan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_mainan' => 'required|string|max:255',
            'usia_rekomendasi' => 'required|string|max:255',
            'bahan' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $gambarPath = $request->file('gambar')->store('mainan_images', 'public');

        MainanAnak::create([
            'nama_mainan' => $request->nama_mainan,
            'usia_rekomendasi' => $request->usia_rekomendasi,
            'bahan' => $request->bahan,
            'harga' => $request->harga,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('admin.mainan.index')->with('success', 'Data mainan berhasil ditambahkan.');
    }

    public function show(MainanAnak $mainan)
    {
        return view('admin.mainan.show', compact('mainan'));
    }

    public function edit(MainanAnak $mainan)
    {
        return view('admin.mainan.edit', compact('mainan'));
    }

    public function update(Request $request, MainanAnak $mainan)
    {
        $request->validate([
            'nama_mainan' => 'required|string|max:255',
            'usia_rekomendasi' => 'required|string|max:255',
            'bahan' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'nama_mainan' => $request->nama_mainan,
            'usia_rekomendasi' => $request->usia_rekomendasi,
            'bahan' => $request->bahan,
            'harga' => $request->harga,
        ];

        if ($request->hasFile('gambar')) {
            if ($mainan->gambar && Storage::disk('public')->exists($mainan->gambar)) {
                Storage::disk('public')->delete($mainan->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('mainan_images', 'public');
        }

        $mainan->update($data);

        return redirect()->route('admin.mainan.index')->with('success', 'Data mainan berhasil diupdate.');
    }

    public function destroy(MainanAnak $mainan)
    {
        if ($mainan->gambar && Storage::disk('public')->exists($mainan->gambar)) {
            Storage::disk('public')->delete($mainan->gambar);
        }
        $mainan->delete();

        return redirect()->route('admin.mainan.index')->with('success', 'Data mainan berhasil dihapus.');
    }

    public function exportPdf()
    {
        $mainans = MainanAnak::all();
        $pdf = PDF::loadView('admin.mainan.pdf', compact('mainans'));
        return $pdf->download('laporan-mainan-anak.pdf');
    }
}
