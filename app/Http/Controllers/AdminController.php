<?php

namespace App\Http\Controllers;

use App\Fabrication;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateItemRequest;
use App\Http\Requests\CreateNewRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Http\Requests\UpdateNewRequest;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use App\Ideadesign\ImageUploader;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        return view('/admin/index');

    }

    public function additemform()
    {
        $manufacturers = Fabrication::all();

        return view('admin.add-item', compact('logos'));

    }


    public function addItemPost(CreateItemRequest $request, ImageUploader $uploader)
    {


        $item = (new Fabrication())->create($request->all());
        $lastId = $item->id;

        foreach ($request->file('file') as $file) {
            $photo = new Image();
            $photo->url = $uploader::upload($file);
            $photo->fabrication_id = $lastId;
            $photo->menu_id = 999;
            $photo->save();
        }

        $request->session()->flash('success', 'Gamintojas sėkmingai pridėtas');
        return redirect()->back();
    }

    public function upload()
    {
        $manufacturers = Fabrication::all();

        return view('admin.partials.upload');
    }
}
