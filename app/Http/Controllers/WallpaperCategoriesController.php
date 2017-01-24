<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WallpapersCategory;
use App\Http\Requests;

class WallpaperCategoriesController extends Controller
{
    protected $_image_path = 'uploads/wallpapers/categories/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = WallpapersCategory::latest()->get();

        return view('admin.manufacturers.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manufacturers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request, [
            'title' => 'required|max:255',
         ]);

        if ($request->file('logo')) {
            $file = $request->file('logo');
            $path = $this->_image_path;
           
            $name = md5(microtime()).uniqid() . "_" .$file->getClientOriginalName();
            $name = str_replace(' ', '_', $name);

            $file->move($path, $name);
        }

        $category = new WallpapersCategory(array(
            'title'=>$request->title,
            'slug'=>str_slug($request->title),
            'logo_name'=> $name,
            'logo_path'=> $path
            ));

        $category->save();

        flash()->success('','Tapetų gamintojas sukurtas');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = WallpapersCategory::findOrFail($id);

        return view('admin.manufacturers.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'title' => 'required|max:255',
         ]);


        $category = WallpapersCategory::findOrFail($id);

        $category->title = $request->title;
        $category->slug = str_slug($request->title);

        $category->save();

        if ($request->manufacturer_photo) {
                $tmp = $category->logo_path.$category->logo_name;
                if (file_exists($tmp)) {
                    unlink($tmp);
                }
                $file = $tmp;
                if(\File::isFile($file)){
                \File::delete($file);
                 }
        }

        if ($request->file('manufacturer_image')) {
            $file = $request->file('manufacturer_image');
            $path = $this->_image_path;
           
            $name = md5(microtime()).uniqid() . "_" .$file->getClientOriginalName();
            $name = str_replace(' ', '_', $name);

            $file->move($path, $name);

            $category->logo_path = $path;
            $category->logo_name = $name;
        }


        $category->save();

        flash()->success('', 'Gamintojas atnaujintas!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = WallpapersCategory::findOrFail($id);

        $category->delete();

        flash()->success('', 'Gamintojas panaikintas!');

        return redirect()->back();
    }
}
