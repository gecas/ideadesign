<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MenuPhoto;
use App\Http\Requests;

class PagesController extends Controller
{
    public function index()
    {
    	$photos = MenuPhoto::all();

    	return view('pages.index', compact('photos'));
    }
}
