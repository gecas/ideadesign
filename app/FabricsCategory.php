<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FabricsCategory extends Model
{
    protected $fillable = ['title_lt', 'title_en', 'title_ru', 'slug'];

    public function fabrics()
    {
    	return $this->hasMany(Fabric::class);
    }
}
