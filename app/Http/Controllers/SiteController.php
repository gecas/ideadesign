<?php

namespace App\Http\Controllers;

use App\Menu_item;
use App\menu_items;
use Illuminate\Http\Request;

use App\Http\Requests;

class SiteController extends Controller
{
    protected $layout = 'layouts.front';


    public function index()
    {
        return view('/site/index');
    }
    public function wallpaper()
    {

        $model = Menu_item::where('id', '=',1)->first();

        return view('/site/wallpaper',['model'=>$model]);
    }
    public function fabrics()
    {
        $model = Menu_item::where('id', '=', 2)->first();
        return view('/site/fabrics',['model'=>$model]);
    }
    public function parquet()
    {
        $model = Menu_item::where('id', '=', 3)->first();
        return view('/site/parquet',['model'=>$model]);
    }

    public function news()
    {
        $model = Menu_item::where('id', '=', 4)->first();
        return view('/site/news',['model'=>$model]);
    }

    public function contacts()
    {
        $model = Menu_item::where('id', '=', 5)->first();
        return view('/site/contacts',['model'=>$model]);
    }
    public function other()
    {
        $model = Menu_item::where('id', '=', 6)->first();
        return view('/site/other',['model'=>$model]);
    }



}
