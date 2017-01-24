<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FlooringCategory;
use App\Flooring;
use App\FlooringPhoto;
use App\Http\Requests;
use Illuminate\Support\Facades\App;

class FlooringController extends Controller
{
    protected $_image_path = 'uploads/flooring/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $floorings = Flooring::latest()->get();

        return view('admin.flooring.index', compact('floorings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = FlooringCategory::all();

        return view('admin.flooring.create', compact('categories'));
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
            'manufacturer'=>'required']);

            $flooring = new Flooring(array(
             'title_lt' => $request->title_lt,
             'title_en' => $request->title_en,
             'title_ru' => $request->title_ru,
             'text_lt' => $request->text_lt,
             'text_en' => $request->text_en,
             'text_ru' => $request->text_ru,
             'category_id'  => $request->manufacturer,
            ));

            $flooring->save();
         
        if ($request->file('photos')) {
                $path = $this->_image_path;
                    foreach ($request->file('photos') as $file) {
                        $name = md5(microtime()).uniqid() . "_" .$file->getClientOriginalName();
                        $file->move($path, $name);
                        $flooring->images()->create(['image_name' => $name, 'image_path' => $path, 'position'=>0, 'flooring_id'=>$flooring->id]);
                    }
                $flooring->save();
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
        $categories = FlooringCategory::all();

        $flooring = Flooring::findOrFail($id)->load('images');

        return view('admin.flooring.edit', compact('categories', 'flooring'));
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


        $flooring = Flooring::findOrFail($id);

        $flooring->title_lt = $request->title_lt;
        $flooring->title_en = $request->title_en;
        $flooring->title_ru = $request->title_ru;
        $flooring->text_lt = $request->text_lt;
        $flooring->text_en = $request->text_en;
        $flooring->text_ru = $request->text_ru;

        $flooring->save();

        if ($request->photo_data) {
            foreach ($request->photo_data as $img_id => $value) {
                if (isset($value['delete'])) {
                    $image = FlooringPhoto::find($img_id);
                    if ($image) {
                        if (file_exists($image->image_path.$image->image_name)) {
                            unlink($image->image_path.$image->image_name);
                        }
                        $image->delete();
                    }
                }elseif (isset($value['position'])) {
                    $image = FlooringPhoto::find($img_id);
                    if ($image) {
                        $image->position = $value['position'];
                        $image->save();
                    }
                }
            }
        }

        if ($request->file('edit-photos')) {
            $path = $this->_image_path;
            //$position = FlooringPhoto::orderBy('position', "DESC")->first()->position;
            foreach ($request->file('edit-photos') as $file) {
                $name = md5(microtime()).uniqid() . "_" .$file->getClientOriginalName();
                $name = str_replace(' ', '_', $name);
                $file->move($path, $name);
                $flooring->images()->create(['image_name' => $name, 'image_path' => $path, 'position'=>0, 'wallpapers_id'=>$flooring->id]);
            }
            $flooring->save();
        }



        flash()->success('', 'Parketlentės pakeistos!');

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
        $flooring = Flooring::find($id);

        $flooring->delete();

        flash()->success('', 'Parketlentė panaikinta!');

        return redirect()->back();
    }

     public function frontIndex()
    {
        $locale = App::getLocale();

        $flooring = Flooring::orderBy('title_'.$locale)->first();

        return view('pages.parketlentes', compact('flooring', 'locale'));
    }

    public function frontCategoryIndex($slug)
    {
        if ($slug) {
            $locale = App::getLocale();
            $category = FlooringCategory::where('slug', '=', $slug)->first();
            $flooring = Flooring::where('category_id', '=', $category->id)->first();

            return view('pages.parketlentes', compact('flooring', 'category', 'locale'));
        } else{
            return redirect()->back();
        }
    }
}
