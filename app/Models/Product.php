<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = "product";

    protected $fillable = [
        "name",
        "price",
    ];

    // Nama fungsi JAMAK (pake 's') karena variannya bisa banyak
    public function variants()
    {
        return $this->hasMany(Variant::class);
    }
}


