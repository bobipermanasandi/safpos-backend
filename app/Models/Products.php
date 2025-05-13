<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{

    use HasFactory;

    public $timestamps = true;



    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'category',
        'images',
        'is_best_seller'
    ];
}
