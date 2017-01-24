<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WallpapersPhoto extends Model
{
	protected $fillable = ['image_name', 'image_path', 'position', 'wallpapers_id'];

    public function wallpaper()
    {
    	return $this->belongsTo(Wallpaper::class);
    }
}