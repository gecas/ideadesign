<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	protected $table = 'news';

    protected $fillable = [
    	'title_lt',
    	'title_en',
    	'title_ru',
    	'slug',
    	'image_path',
    	'image_name',
    	'excerpt_lt',
    	'excerpt_en',
    	'excerpt_ru',
    	'body_lt',
    	'body_en',
    	'body_ru'
    	];
}
