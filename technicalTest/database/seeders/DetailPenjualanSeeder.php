<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\DetailPenjualan;
use App\Models\Penjualan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailPenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id-ID');

        $penjualans = Penjualan::all();
        $barangs = Barang::all();

        foreach ($penjualans as $penjualan) {
            // Buat 2 sampai 5 detail penjualan per penjualan
            $detailCount = rand(2, 5);
            
            for ($i = 0; $i < $detailCount; $i++) {
                DetailPenjualan::create([
                    'penjualan_id' => $penjualan->id, 
                    'barang_id' => $barangs->random()->id, 
                    'jumlah' => rand(1, 3), 
                    'harga' => $faker->numberBetween(10000, 1000000),
                ]);
            }
        }
    }
}
