<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDestinationRequest;
use App\Http\Requests\UpdateDestinationRequest;
use App\Models\City;
use Illuminate\Support\Facades\File;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $destinations = Destination::orderBy('created_at', 'desc')->get();
        return view('dashboard.destinations.index', ['destinations' => $destinations]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.destinations.create', ['cities' => City::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDestinationRequest $request)
    {
        // Cek jika ada file gambar diupload
        if ($request->hasFile('image')) {
            // Ambil file gambar
            $image = $request->file('image');

            // Buat nama file berdasarkan title dan ekstensi asli
            $imageName = str_slug($request->input('name')) . '.' . $image->getClientOriginalExtension();

            // Simpan gambar ke public/assets/img
            $image->move(public_path('assets/img'), $imageName);
        }
        Destination::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imageName,
            'location' => $request->location,
            'city_id' => $request->city_id
        ]);

        return redirect()->route('destinations.index')->with('success', 'Workout created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Destination $destination)
    {
        return view('dashboard.destinations.show', ['destination' => $destination]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Destination $destination)
    {
        return view('dashboard.destinations.edit', ['destination' => $destination, 'cities' => City::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDestinationRequest $request, Destination $destination)
    {
        $request->validated();

        // Cek jika ada file gambar diupload
        if ($request->hasFile('image')) {
            // Ambil file gambar
            $image = $request->file('image');

            // Buat nama file berdasarkan title dan ekstensi asli
            $imageName = str_slug($request->input('name')) . '.' . $image->getClientOriginalExtension();

            // Hapus gambar lama jika ada
            if ($destination->image) {
                $oldImagePath = public_path('assets/img/' . $destination->image);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }

            // Simpan gambar baru ke public/assets/img
            $image->move(public_path('assets/img'), $imageName);

            // Tambahkan nama file gambar baru ke data
        }

        // Update workout di database dengan data baru
        $destination->update($request->all());

        return redirect()->route('destinations.index')->with('success', 'Workout updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Destination $destination)
    {
        // Hapus gambar jika ada
        if ($destination->image) {
            $imagePath = public_path('assets/img/' . $destination->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        // Hapus workout dari database
        $destination->delete();

        return redirect()->route('destinations.index')->with('success', 'Workout deleted successfully.');
    }
}
