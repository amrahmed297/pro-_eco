<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    'name', 'price', 'quantity', 'image_path', 'category_id'
];

public function category()
{
    return $this->belongsTo(Cat::class, 'category_id');
}

}

