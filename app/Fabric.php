<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fabric extends Model
{
    protected $fillable = [
		'title_lt',
		'title_en',
		'title_ru',
		'text_lt',
		'text_en',
		'text_ru',
		'category_id',
	];

    public function category()
    {
    	return $this->belongsTo(FabricsCategory::class);
    }

    public function images()
    {
    	return $this->hasMany(FabricsImage::class, 'fabrics_id')->orderBy('position', 'ASC')->orderBy('created_at', 'DESC');
    }
}
