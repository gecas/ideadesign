<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccessoriesPhoto extends Model
{
    protected $fillable = ['image_name', 'image_path', 'position', 'accessories_id'];

    public function accessory()
    {
    	return $this->belongsTo(Accessory::class);
    }
}
