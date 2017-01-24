<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FabricsCategory;
use App\Http\Requests;

class FabricsCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = FabricsCategory::latest()->get();

        return view('admin.fabrics_categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.fabrics_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fabrics_category = FabricsCategory::create([
            'title_lt'=>$request->title_lt,
            'title_en'=>$request->title_en,
            'title_ru'=>$request->title_ru,
            'slug'=> str_slug($request->title_lt)]);

        flash()->success('', 'Audinių kategorija sukurta');

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
        $category = FabricsCategory::find($id);

        return view('admin.fabrics_categories.edit', compact('category'));
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
         ]);


        $category = FabricsCategory::findOrFail($id);

        $category->title_lt = $request->title_lt;
        $category->title_en = $request->title_en;
        $category->title_ru = $request->title_ru;
        $category->slug = str_slug($request->title_lt);
        $position = FabricsCategory::all()->count();
        $category->position = $position++;

        $category->save();

        flash()->success('', 'Kategorija redaguota!');

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
        $category = FabricsCategory::find($id);

        $category->delete();

        flash()->success('', 'Kategorija panaikinta!');

        return redirect()->back();
    }
}
