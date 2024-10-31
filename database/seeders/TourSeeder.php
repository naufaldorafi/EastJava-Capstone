<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tour;

class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tour::create([
            'name' => 'Museum 10 November',
            'description' => 'Museum 10 November adalah museum yang berada di Surabaya, Jawa Timur, Indonesia. Museum ini didirikan pada tanggal 10 November 1978, bertepatan dengan peringatan Hari Pahlawan. Museum ini berada di Jalan Pahlawan No. 1, Surabaya.',
            'price' => 5000,
            'location' => 'surabaya',
            'image' => 'https://lh3.googleusercontent.com/fPOuUsPL2qS0IP0LPBHq2KYvdZ_3pdEQgP-ZmatPAEcx3lZitgCPgTjPoWS5xUKO_a3cstS7KxORrO96bnYwf-NMI-kdVkNJmknp6lXbdazqjWyRgPL75L3tmEvRdLcbXFyZ0Ql-zOAF38f1AIa_pz-tdHYxyEzd9etiNzzJ__wX9ccdiOD-OiBDFw',
            'status' => 'published',
            'address' => 'Jalan Pahlawan No. 1, Surabaya',
        ]);

        Tour::create([
            'name' => 'Tugu Pahlawan',
            'description' => 'Tugu Pahlawan adalah sebuah tugu peringatan yang terletak di Surabaya, Indonesia. Tugu ini didirikan untuk memperingati para pejuang kemerdekaan Indonesia di Surabaya. Tugu ini berada di Jalan Pahlawan, Surabaya.',
            'price' => 0,
            'location' => 'surabaya',
            'image' => 'https://tiketwisata.surabaya.go.id/storage/tour/monumen-tugu-pahlawan_1680340884.jpeg',
            'status' => 'published',
            'address' => 'Jalan Pahlawan, Surabaya',
        ]);
    }
}
