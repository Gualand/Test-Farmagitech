<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id-ID');

        for ($i=0; $i < 20; $i++) { 
            Barang::create([
                'nama' => $faker->word,
                'harga' => $faker->numberBetween(10000, 1000000)
            ]);
        }
    }
}
