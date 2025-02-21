<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function profile()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu!');
        }

        $user = Auth::user();

        // Decode JSON address agar bisa digunakan di Blade
        $user->address = json_decode($user->address, true);

        return view('clients.profile', compact('user'));
    }

    public function updateProfile(Request $request)
{
    /** @var \App\Models\User $user */
    $user = Auth::user();

    $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'nullable|array',

        // Validasi untuk nested address
        'address.nama_penerima' => 'nullable|string|max:255',
        'address.no_telepon' => 'nullable|string|max:15',
        'address.provinsi' => 'nullable|string|max:255',
        'address.kota_kabupaten' => 'nullable|string|max:255',
        'address.kecamatan' => 'nullable|string|max:255',
        'address.kode_pos' => 'nullable|string|max:10',
        'address.alamat_lengkap' => 'nullable|string|max:500',
    ]);

    // Decode data lama dari database
    $oldAddress = json_decode($user->address, true) ?? [];

    // Gabungkan data lama dengan yang baru agar tidak hilang
    $newAddress = array_merge($oldAddress, $request->input('address', []));

    // Simpan dalam format JSON
    $user->update([
        'name' => $request->name,
        'address' => json_encode($newAddress),
    ]);

    return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui!');
}

}
