<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flooring extends Model
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
    	return $this->belongsTo(FlooringCategory::class);
    }

    public function images()
    {
    	return $this->hasMany(FlooringPhoto::class, 'flooring_id')->orderBy('position', 'ASC')->orderBy('created_at', 'DESC');
    }
}
