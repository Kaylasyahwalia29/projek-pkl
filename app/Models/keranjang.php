<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keranjang extends Model
{
    use HasFactory;
    public $fillable = ['jumlah'];
    public $visible = ['jumlah'];
    public $timestamps = true;

    public function produk()
    {
        return $this->belongsTo(produk::class, 'id_produk');
    }

    public function keranjang()
    {
        return $this->hasMany(keranjang::class, 'id_keranjang');
    }
}
