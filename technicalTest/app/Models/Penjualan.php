<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    protected $table = "penjualan";

    protected $fillable = ['tanggal', 'nama_pembeli', 'no_hp', 'total_harga'];

    public function detailPenjualan()
    {
        return $this->hasMany(DetailPenjualan::class);
    }
}
