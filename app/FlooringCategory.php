<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FlooringCategory extends Model
{
    protected $fillable = ['title', 'slug'];

    public function flooring()
    {
    	return $this->hasMany(Flooring::class);
    }
}
