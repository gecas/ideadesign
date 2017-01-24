<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manufacturer;
use App\Http\Requests;
use App\Http\Requests\CreateManufacturerRequest;

class ManufacturersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('Hi');
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
    public function store(CreateManufacturerRequest $request)
    {
        if ($request->file('file')) {
            $file = $request->file('file');
            $path = $this->_league_logo_path;
            $type = $this->type;
           
            $name = md5(microtime()).uniqid() . "_" .$file->getClientOriginalName();
            $file->move($path, $name);
            $images = $this->processImages($path, $name, $path, $type);
        }
        $manufacturer = new Manufacturer(array(
            'title'=>$request->get('manufacturer_title'),
            'logo_name' => $name,
            'logo_path' => $path,
            ));
 
        $manufacturer->save();
        //flash()->error('Success!','Your flyer has been created');
        //flash()->success('','Nauja lyga sukurta');
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
        //
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
        //
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
}
