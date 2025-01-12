<?php

namespace Database\Seeders;

use App\Models\Penjualan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id-ID');

        for ($i=0; $i < 10 ; $i++) { 
            Penjualan::create([
                'tanggal' => $faker->date(),
                'nama_pembeli' => $faker->name(),
                'no_hp' => $faker->phoneNumber(),
                'total_harga' => $faker->numberBetween(10000, 1000000)
            ]);
        }
    }
}
