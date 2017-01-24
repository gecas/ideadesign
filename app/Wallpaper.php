<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallpaper extends Model
{
	protected $fillable = [
		'title_lt',
		'title_en',
		'title_ru',
		'text_lt',
		'text_en',
		'text_ru',
		'manufacturer_url',
		'category_id',
	];

    public function category()
    {
    	return $this->belongsTo(WallpapersCategory::class);
    }

    public function images()
    {
    	return $this->hasMany(WallpapersPhoto::class, 'wallpapers_id')->orderBy('position', 'ASC')->orderBy('created_at', 'DESC');
    }
}
