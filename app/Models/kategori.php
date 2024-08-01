<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;
    public $fillable = ['image_kategori', 'name_produk'];
    public $visible = ['image_kategori', 'name_produk'];
    public $timestamps = true;

    public function deleteImage()
    {
        if ($this->image_kategori && file_exists(public_path('images/kategori/' . $this->image_kategori))) {
            return unlink(public_path('images/kategori/' . $this->image_kategori));
        }
    }
    
    public function kategori()
    {
        return $this->hasMany(kategori::class, 'id_kategori');
    }
}
