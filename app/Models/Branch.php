<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    public function product(){
        // un producto se ubicado en una sucursal
        return $this->hasMany(Product::class);
    }
}
