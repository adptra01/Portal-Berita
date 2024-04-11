<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdvertRequest;
use App\Models\Advert;
use Illuminate\Support\Facades\Storage;

class AdvertController extends Controller
{
    public function store(AdvertRequest $request)
    {
        // Validasi request
        $validatedData = $request->validated();

        // Simpan gambar
        $imagePath = $request->file('image')->store('public/image');
        $validatedData['image'] = $imagePath;

        // Cek apakah sudah ada iklan pop-up yang ada
        if ($validatedData['position'] === 'popup' && Advert::where('position', 'popup')->exists()) {
            return redirect()->back()->with('error', 'Hanya satu iklan pop-up yang diperbolehkan');
        }

        // Buat iklan baru
        Advert::create($validatedData);

        return redirect()->route('adverts.index')->with('success', 'Iklan berhasil dibuat');
    }
    public function update(AdvertRequest $request, $id)
    {
        // Validasi request
        $validatedData = $request->validated();
        $advert = Advert::findOrFail($id);

        // Periksa apakah ada perubahan pada gambar
        if ($request->hasFile('image')) {
            // Hapus gambar lama
            Storage::delete($advert->image);

            // Simpan gambar yang baru diunggah
            $imagePath = $request->file('image')->store('public/image');
            $validatedData['image'] = $imagePath;
        }

        // Periksa apakah ada perubahan pada posisi iklan
        if ($advert->position !== 'popup' && $validatedData['position'] === 'popup' && Advert::where('position', 'popup')->exists()) {
            return redirect()->back()->with('error', 'Hanya satu iklan pop-up yang diperbolehkan');
        }

        // Update data iklan
        $advert->update($validatedData);

        return redirect()->route('adverts.index')->with('success', 'Iklan berhasil diperbarui');
    }
}
