<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            // Ambil file gambar
            $image = $request->file('image');

            // Buat nama file berdasarkan title dan ekstensi asli
            $imageName = str_slug($request->input('name')) . '.' . $image->getClientOriginalExtension();

            // Hapus gambar lama jika ada
            if ($user->image) {
                $oldImagePath = public_path('assets/img/' . $user->image);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }

            // Simpan gambar baru ke public/assets/img
            $image->move(public_path('assets/img'), $imageName);

            // Tambahkan nama file gambar baru ke data
            $validatedData['image'] = $imageName;
        }

        if ($request->user()->isDirty('email')) {
            $validatedData['email_verified_at'] = null;
        }

        // Isi user dengan data yang sudah divalidasi dan dimodifikasi
        $user->fill($validatedData);
        $user->save();

        // Update user di database dengan data baru
        return redirect()->route('profile.index')->with('success', 'Profile updated successfully.');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
