<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'branch_id',
        'user_id',
        'date_purchase',
        'status',
    ];

    public function category(){
        // un producto pertenece a una categoria
        return $this->belongsTo(Category::class);
    }

    public function branch(){
        // un producto pertenece a una sucursal
        return $this->belongsTo(Branch::class);
    }
}
