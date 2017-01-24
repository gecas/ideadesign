<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuPhoto extends Model
{
    protected $fillable = ['category', 'image_path', 'image_name'];
}
