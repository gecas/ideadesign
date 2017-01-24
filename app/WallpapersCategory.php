<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WallpapersCategory extends Model
{
    protected $fillable = ['title', 'logo_path', 'logo_name', 'slug'];

    public function wallpapers()
    {
    	return $this->hasMany(Wallpapers::class);
    }
}
