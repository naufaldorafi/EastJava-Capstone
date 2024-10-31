<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\City;
use App\Models\Destination;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaction;
use App\Models\Wallet;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // City::create([
        //     'name' => 'Surabaya',
        // ]);
        // City::create([
        //     'name' => 'Kediri',
        // ]);
        // City::create([
        //     'name' => 'Gresik',
        // ]);
        // City::create([
        //     'name' => 'Malang',
        // ]);
        // City::create([
        //     'name' => 'Banyuwangi',
        // ]);
        // City::create([
        //     'name' => 'Jember',
        // ]);
        // Destination::factory(20)->create();
        User::factory(20)->create()->each(function ($user) {
            $wallet = Wallet::factory()->make();
            $user->wallet()->save($wallet);

            for ($i = 0; $i < 5; $i++) {
                $booking = Booking::factory()->make();
                $user->bookings()->save($booking);

                $transaction = Transaction::factory()->make(['amount' => $booking->total_price, 'wallet_id' => $wallet->id]);
                $booking->transaction()->save($transaction);
            }
        });
    }
}
