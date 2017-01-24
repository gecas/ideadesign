<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Accessory;
use App\AccessoriesPhoto;
use App\Http\Requests;
use Illuminate\Support\Facades\App;

class AccessoriesController extends Controller
{
    protected $_image_path = 'uploads/accessories/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.accessories.create');
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
            'text_lt'=>'required',
            'text_en'=>'required',
            'text_ru'=>'required',
           ]);

            $accessory = new Accessory(array(
             'text_lt' => $request->text_lt,
             'text_en' => $request->text_en,
             'text_ru' => $request->text_ru
            ));

            $accessory->save();
         
        if ($request->file('photos')) {
                $path = $this->_image_path;
                    foreach ($request->file('photos') as $file) {
                        $name = md5(microtime()).uniqid() . "_" .$file->getClientOriginalName();
                        $file->move($path, $name);
                        $accessory->images()->create(['image_name' => $name, 'image_path' => $path, 'position'=>0, 'accessories_id'=>$accessory->id]);
                    }
                $accessory->save();
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
    public function edit()
    {
        $accessory = Accessory::first();

        return view('admin.accessories.edit', compact('accessory'));
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
            'text_lt' => 'required',
            'text_ru' => 'required',
            'text_en' => 'required',
         ]);


        $accessory = Accessory::findOrFail($id);

        $accessory->text_lt = $request->text_lt;
        $accessory->text_en = $request->text_en;
        $accessory->text_ru = $request->text_ru;

        $accessory->save();

        if ($request->photo_data) {
            foreach ($request->photo_data as $img_id => $value) {
                if (isset($value['delete'])) {
                    $image = AccessoriesPhoto::find($img_id);
                    if ($image) {
                        if (file_exists($image->image_path.$image->image_name)) {
                            unlink($image->image_path.$image->image_name);
                        }
                        $image->delete();
                    }
                }elseif (isset($value['position'])) {
                    $image = AccessoriesPhoto::find($img_id);
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
                $accessory->images()->create(['image_name' => $name, 'image_path' => $path, 'position'=>0, 'accessories_id'=>$accessory->id]);
            }
            $accessory->save();
        }



        flash()->success('', 'Aksesuarai pakeisti!');

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
        //
    }

    public function frontIndex()
    {
        $locale = App::getLocale();

        $accessory = Accessory::first();

        return view('pages.aksesuarai', compact('accessory', 'locale'));
    }
}
