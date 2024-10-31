<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use App\Models\Destination;


class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.bookings.index', ['bookings' => Booking::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingRequest $request)
    {
        // Dapatkan user yang sedang login
        $user = auth()->user();

        // Cek apakah user memiliki wallet
        if (!$user->wallet) {
            return redirect()->route('profile.index')->with('error', 'Anda harus membuat wallet sebelum melakukan booking.');
        }

        // Cek apakah saldo user cukup
        $total_price = $request->validated()['quantity'] * Destination::find($request->validated()['destination_id'])->price;
        if ($user->wallet->balance < $total_price) {
            return redirect()->back()->withErrors(['error' => 'Saldo Anda tidak cukup untuk melakukan booking.']);
        }

        // Mulai transaksi database
        DB::beginTransaction();

        try {
            // Buat booking baru
            $booking = Booking::create([
                'user_id' => auth()->id(),
                'destination_id' => $request->validated()['destination_id'],
                'booking_date' => $request->validated()['booking_date'],
                'quantity' => $request->validated()['quantity'],
                'total_price' => $total_price,
                'status' => 'approved',
            ]);

            // Kurangi saldo user
            $user->wallet->update([
                'balance' => $user->wallet->balance - $booking->total_price
            ]);

            // Buat transaksi baru
            Transaction::create([
                'wallet_id' => $user->wallet->id,
                'booking_id' => $booking->id,
                'amount' => $booking->total_price,
                'type' => 'purchase',
            ]);

            // Commit transaksi database
            DB::commit();

            return redirect()->route('destinations.index')->with('success', 'Booking berhasil dilakukan.');
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollback();

            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat melakukan booking.']);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
