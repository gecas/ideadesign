<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FabricsCategory;
use App\Http\Requests;
use App\Fabric;
use App\FabricsImage;
use Illuminate\Support\Facades\App;

class FabricsController extends Controller
{
    protected $_image_path = 'uploads/fabrics/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fabrics = Fabric::latest()->with('images')->get();

        return view('admin.fabrics.index', compact('fabrics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = FabricsCategory::all();

        return view('admin.fabrics.create', compact('categories'));
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
            'title_lt'=>'required|unique:fabrics',
            'title_en'=>'required|unique:fabrics', 
            'title_ru'=>'required|unique:fabrics',
            'text_lt'=>'required',
            'text_en'=>'required',
            'text_ru'=>'required']);

            $fabric = new Fabric(array(
             'title_lt' => $request->title_lt,
             'title_en' => $request->title_en,
             'title_ru' => $request->title_ru,
             'text_lt' => $request->text_lt,
             'text_en' => $request->text_en,
             'text_ru' => $request->text_ru,
             'category_id'  => $request->category,
            ));

            $fabric->save();
         
        if ($request->file('photos')) {
                $path = $this->_image_path;
                    foreach ($request->file('photos') as $file) {
                        $name = md5(microtime()).uniqid() . "_" .$file->getClientOriginalName();
                        $file->move($path, $name);
                        $fabric->images()->create(['image_name' => $name, 'image_path' => $path, 'position'=>0, 'fabrics_id'=>$fabric->id]);
                    }
                $fabric->save();
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
        $categories = FabricsCategory::all();

        $fabric = Fabric::findOrFail($id)->load('images');

        return view('admin.fabrics.edit', compact('fabric', 'categories'));
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


        $fabric = Fabric::findOrFail($id);

        $fabric->title_lt = $request->title_lt;
        $fabric->title_en = $request->title_en;
        $fabric->title_ru = $request->title_ru;
        $fabric->text_lt = $request->text_lt;
        $fabric->text_en = $request->text_en;
        $fabric->text_ru = $request->text_ru;
        $fabric->category_id = $request->category;

        $fabric->save();

        if ($request->photo_data) {
            foreach ($request->photo_data as $img_id => $value) {
                if (isset($value['delete'])) {
                    $image = FabricsImage::find($img_id);
                    if ($image) {
                        if (file_exists($image->image_path.$image->image_name)) {
                            unlink($image->image_path.$image->image_name);
                        }
                        $image->delete();
                    }
                }elseif (isset($value['position'])) {
                    $image = FabricsImage::find($img_id);
                    if ($image) {
                        $image->position = $value['position'];
                        $image->save();
                    }
                }
            }
        }


        if ($request->file('edit-photos')) {
            $path = $this->_image_path;
           // $position = fabricsPhoto::orderBy('position', "DESC")->first()->position;
            foreach ($request->file('edit-photos') as $file) {
                $name = md5(microtime()).uniqid() . "_" .$file->getClientOriginalName();
                $name = str_replace(' ', '_', $name);
                $file->move($path, $name);
                $fabric->images()->create(['image_name' => $name, 'image_path' => $path, 'position'=>0, 'fabrics_id'=>$fabric->id]);
            }
            $fabric->save();
        }



        flash()->success('', 'Audiniai pakeisti!');

        return redirect('/admin/fabrics');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fabric = Fabric::findOrFail($id);

        $fabric->delete();

        flash()->success('','Audiniai panaikinti');

       return redirect()->back();
    }

    public function frontIndex()
    {
        $locale = App::getLocale();

        $categories = FabricsCategory::orderBy('position', 'ASC')->get();

        $fabrics = Fabric::latest()->get();

        return view('pages.audiniai', compact('fabrics', 'locale', 'categories'));
    }

    public function frontCategoryIndex($slug)
    {
        if ($slug) {
            $locale = App::getLocale();
            $category = FabricsCategory::where('slug', '=', $slug)->first();
            $fabric = Fabric::where('category_id', '=', $category->id)->first();

            return view('pages.audiniai', compact('fabric', 'category', 'locale', 'categories'));
        } else{
            return redirect()->back();
        }
    }
}
