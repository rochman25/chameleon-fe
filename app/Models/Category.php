<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, Uuids;
    protected $table = "kategori";
    protected $primaryKey = 'id_kategori';

    public function product()
    {
        return $this->hasMany(Product::class, 'id_produk');
    }
}
