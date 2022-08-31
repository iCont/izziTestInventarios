<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function product()
    {
        // un categoria puede tener muchos productos
        return $this->hasMany(Product::class);
    }
}
