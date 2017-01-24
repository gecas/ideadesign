<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accessory extends Model
{
	protected $fillable = [
		'text_lt',
		'text_en',
		'text_ru',
	];
    public function images()
    {
    	return $this->hasMany(AccessoriesPhoto::class, 'accessories_id')->orderBy('position', 'ASC')->orderBy('created_at', 'DESC');
    }
}
