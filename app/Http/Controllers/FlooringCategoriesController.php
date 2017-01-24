<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FlooringCategory;
use App\Http\Requests;

class FlooringCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = FlooringCategory::latest()->get();

        return view('admin.flooring_manufacturer.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.flooring_manufacturer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $flooring_manufacturer = FlooringCategory::create(['title'=>$request->title, 'slug'=> str_slug($request->title)]);

        flash()->success('', 'Parketlenčių gamintojas sukurtas');

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
        $category = FlooringCategory::findOrFail($id);

        return view('admin.flooring_manufacturer.edit', compact('category'));
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


        $category = FlooringCategory::findOrFail($id);

        $category->title = $request->title;
        $category->slug = str_slug($request->title);

        $category->save();

        flash()->success('', 'Gamintojas redaguotas!');

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
        $category = FlooringCategory::findOrFail($id);

        $category->delete();

        flash()->success('', 'Gamintojas panaikintas!');

        return redirect()->back();
    }
}
