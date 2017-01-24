<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WallpapersCategory;
use App\Http\Requests;
use App\Wallpaper;
use App\WallpapersPhoto;
use Illuminate\Support\Facades\App;

class WallpapersController extends Controller
{
    protected $_image_path = 'uploads/wallpapers/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wallpapers = Wallpaper::latest()->with('images')->get();

        return view('admin.wallpapers.index', compact('wallpapers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = WallpapersCategory::all();

        return view('admin.wallpapers.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {   
        ini_set('max_execution_time', 300); 
        ini_set('post_max_size', '64M');
        ini_set('upload_max_filesize', '64M');

        $this->validate($request,[
            'title_lt'=>'required|unique:wallpapers',
            'title_en'=>'required|unique:wallpapers', 
            'title_ru'=>'required|unique:wallpapers',
            'text_lt'=>'required',
            'text_en'=>'required',
            'text_ru'=>'required',
            'manufacturer_url'=>'required|url',
            'manufacturer'=>'required']);

            $wallpaper = new Wallpaper(array(
             'title_lt' => $request->title_lt,
             'title_en' => $request->title_en,
             'title_ru' => $request->title_ru,
             'text_lt' => $request->text_lt,
             'text_en' => $request->text_en,
             'text_ru' => $request->text_ru,
             'manufacturer_url'  => $request->manufacturer_url,
             'category_id'  => $request->manufacturer,
            ));

            $wallpaper->save();
         
        if ($request->file('photos')) {
                $path = $this->_image_path;
                    foreach ($request->file('photos') as $file) {
                        $name = md5(microtime()).uniqid() . "_" .$file->getClientOriginalName();
                        $file->move($path, $name);
                        $wallpaper->images()->create(['image_name' => $name, 'image_path' => $path, 'position'=>0, 'wallpapers_id'=>$wallpaper->id]);
                    }
                $wallpaper->save();
        }
              
        flash()->success('','Sukurta!');
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
        $categories = WallpapersCategory::all();

        $wallpaper = Wallpaper::findOrFail($id)->load('images');

        return view('admin.wallpapers.edit', compact('wallpaper', 'categories'));
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
            'title_lt' => 'required|max:255',
            'title_en' => 'required|max:255',
            'title_ru' => 'required|max:255',
            'text_lt' => 'required',
            'text_ru' => 'required',
            'text_en' => 'required',
         ]);


        $wallpaper = Wallpaper::findOrFail($id);

        $wallpaper->title_lt = $request->title_lt;
        $wallpaper->title_en = $request->title_en;
        $wallpaper->title_ru = $request->title_ru;
        $wallpaper->text_lt = $request->text_lt;
        $wallpaper->text_en = $request->text_en;
        $wallpaper->text_ru = $request->text_ru;

        $wallpaper->save();

        if ($request->photo_data) {
            foreach ($request->photo_data as $img_id => $value) {
                if (isset($value['delete'])) {
                    $image = WallpapersPhoto::find($img_id);
                    if ($image) {
                        if (file_exists($image->image_path.$image->image_name)) {
                            unlink($image->image_path.$image->image_name);
                        }
                        $image->delete();
                    }
                }elseif (isset($value['position'])) {
                    $image = WallpapersPhoto::find($img_id);
                    if ($image) {
                        $image->position = $value['position'];
                        $image->save();
                    }
                }
            }
        }


        if ($request->file('edit-photos')) {
            $path = $this->_image_path;
           // $position = WallpapersPhoto::orderBy('position', "DESC")->first()->position;
            foreach ($request->file('edit-photos') as $file) {
                $name = md5(microtime()).uniqid() . "_" .$file->getClientOriginalName();
                $name = str_replace(' ', '_', $name);
                $file->move($path, $name);
                $wallpaper->images()->create(['image_name' => $name, 'image_path' => $path, 'position'=>0, 'wallpapers_id'=>$wallpaper->id]);
            }
            $wallpaper->save();
        }



        flash()->success('', 'Tapetai pakeisti!');

        return redirect('/admin/wallpapers');        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wallpaper = Wallpaper::findOrFail($id);

        $wallpaper->delete();

        flash()->success('','Tapetai panaikinti');

       return redirect()->back();
    }

    public function frontIndex()
    {
        $locale = App::getLocale();

        $wallpaper = Wallpaper::orderBy('title_'.$locale)->first();

        return view('pages.tapetai', compact('wallpaper', 'locale'));
    }

    public function frontCategoryIndex($slug)
    {
        if ($slug) {
            $locale = App::getLocale();
            $category = WallpapersCategory::where('slug', '=', $slug)->first();
            $wallpaper = Wallpaper::where('category_id', '=', $category->id)->first();

            return view('pages.tapetai', compact('wallpaper', 'category', 'locale'));
        } else{
            return redirect()->back();
        }
    }
}
