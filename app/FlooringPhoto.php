<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FlooringPhoto extends Model
{
    protected $fillable = ['image_name', 'image_path', 'position', 'flooring_id'];

    public function flooring()
    {
    	return $this->belongsTo(Flooring::class);
    }
}
