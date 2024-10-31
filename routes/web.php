<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\WalletController;
use App\Models\User;
use App\Models\Booking;
use App\Models\Destination;
use Illuminate\Support\Facades\Auth;
use App\Models\City;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard.index', ['users' => User::all()]);
})->name('dashboard');
// ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->prefix('dashboard')->group(function () {
    Route::get('/', function () {
        if (Auth::user()->role == 'user') {
            return view('dashboard');
        } else {
            $totalRevenue = 0;
            foreach (Booking::all() as $booking) {
                $totalRevenue += $booking->total_price;
            }
            $topBookings = User::withCount('bookings')
                ->withSum('bookings', 'total_price')
                ->orderBy('bookings_count', 'desc')
                ->orderBy('bookings_sum_total_price', 'desc')
                ->take(5)
                ->get();

            $monthlyBookingsLabels = Booking::get()->groupBy(function ($item) {
                return $item->created_at->format('Y-m');
            })->sortKeys()->keys();

            $monthlyBookingsData = Booking::get()->groupBy(function ($item) {
                return $item->created_at->format('Y-m');
            })->sortKeys()->map(function ($item) {
                return $item->sum('total_price');
            });

            $topBookings = User::withCount('bookings')
                ->withSum('bookings', 'total_price')
                ->orderBy('bookings_count', 'desc')
                ->orderBy('bookings_sum_total_price', 'desc')
                ->take(5)
                ->get();

            // Get the top 4 cities with the most bookings using Eloquent
            $topCities = City::withCount(['destinations as total_bookings' => function ($query) {
                $query->join('bookings', 'destinations.id', '=', 'bookings.destination_id');
            }])
                ->orderBy('total_bookings', 'desc')
                ->take(5)
                ->get();

            $totalBookings = Booking::count();

            // Calculate the percentage of bookings for each city
            $topCities->map(function ($city) use ($totalBookings) {
                $city->percentage = ($city->total_bookings / $totalBookings) * 100;
                return $city;
            });

            $startMonth = now();
            $endMonth = now()->addMonths(10);

            $bookingsData = [];

            foreach ($topCities as $city) {
                $bookingsData[$city->name] = Booking::selectRaw('YEAR(booking_date) as year, MONTH(booking_date) as month, COUNT(*) as total')
                    ->join('destinations', 'bookings.destination_id', '=', 'destinations.id')
                    ->where('destinations.city_id', $city->id)
                    ->whereBetween('booking_date', [$startMonth, $endMonth])
                    ->groupBy('year', 'month')
                    ->orderBy('year')
                    ->orderBy('month')
                    ->get();
            }


            return view('dashboard.index', [
                'users' => User::all(),
                'totalRevenue' => $totalRevenue,
                'bookings' => Booking::all(),
                'destinations' => Destination::all(),
                'topBookings' => $topBookings,
                'monthlyBookingsLabels' => $monthlyBookingsLabels,
                'monthlyBookingsData' => $monthlyBookingsData,
                'topCities' => $topCities,
                'bookingsData' => $bookingsData,
            ]);
        }
    })->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('destinations', DestinationController::class);
    Route::resource('bookings', BookingController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('wallets', WalletController::class);
});

Route::get('/dashboard/tours/{tour}', function () {
    return view('dashboard.tours', ['tours' => \App\Models\Tour::all()]);
})->name('dashboard.tours');

require __DIR__ . '/auth.php';
