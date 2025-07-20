<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cat extends Model
{

    protected $table = 'category';

protected $fillable = ['name', 'image_path'];

}
