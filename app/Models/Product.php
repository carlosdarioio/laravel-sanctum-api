<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//alola
//php artisan make:model Product --migration 
class Product extends Model
{
    use HasFactory;
    //protected $table='my_products'
    protected $fillable=[
        'name',
        'slug',
        'description',
        'price'
    ];
}
