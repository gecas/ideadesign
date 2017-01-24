<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FabricsImage extends Model
{
    protected $fillable = ['image_name', 'image_path', 'position', 'fabrics_id'];

    public function fabric()
    {
    	return $this->belongsTo(Fabric::class);
    }
}
