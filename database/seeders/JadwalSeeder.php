<?php

namespace Database\Seeders;

use App\Models\Jam;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jam::create([
            'jam_mulai' => '06.00',
            'jam_selesai' => '07.00',
            'harga' => '60000'
        ]);
        Jam::create([
            'jam_mulai' => '07.00',
            'jam_selesai' => '08.00',
            'harga' => '60000'
        ]);
        Jam::create([
            'jam_mulai' => '08.00',
            'jam_selesai' => '09.00',
            'harga' => '60000'
        ]);
        Jam::create([
            'jam_mulai' => '09.00',
            'jam_selesai' => '10.00',
            'harga' => '60000'
        ]);
        Jam::create([
            'jam_mulai' => '10.00',
            'jam_selesai' => '11.00',
            'harga' => '60000'
        ]);
        Jam::create([
            'jam_mulai' => '11.00',
            'jam_selesai' => '12.00',
            'harga' => '60000'
        ]);
        Jam::create([
            'jam_mulai' => '12.00',
            'jam_selesai' => '13.00',
            'harga' => '60000'
        ]);
        Jam::create([
            'jam_mulai' => '13.00',
            'jam_selesai' => '14.00',
            'harga' => '60000'
        ]);
        Jam::create([
            'jam_mulai' => '14.00',
            'jam_selesai' => '15.00',
            'harga' => '80000'
        ]);
        Jam::create([
            'jam_mulai' => '15.00',
            'jam_selesai' => '16.00',
            'harga' => '80000'
        ]);
        Jam::create([
            'jam_mulai' => '16.00',
            'jam_selesai' => '17.00',
            'harga' => '80000'
        ]);
        Jam::create([
            'jam_mulai' => '17.00',
            'jam_selesai' => '18.00',
            'harga' => '80000'
        ]);
        Jam::create([
            'jam_mulai' => '18.00',
            'jam_selesai' => '19.00',
            'harga' => '100000'
        ]);
        Jam::create([
            'jam_mulai' => '19.00',
            'jam_selesai' => '20.00',
            'harga' => '100000'
        ]);
        Jam::create([
            'jam_mulai' => '20.00',
            'jam_selesai' => '21.00',
            'harga' => '100000'
        ]);
        Jam::create([
            'jam_mulai' => '21.00',
            'jam_selesai' => '22.00',
            'harga' => '100000'
        ]);
        Jam::create([
            'jam_mulai' => '22.00',
            'jam_selesai' => '23.00',
            'harga' => '100000'
        ]);
        Jam::create([
            'jam_mulai' => '23.00',
            'jam_selesai' => '24.00',
            'harga' => '100000'
        ]);
    }
}

