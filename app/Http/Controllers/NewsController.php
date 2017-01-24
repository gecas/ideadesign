<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Http\Requests;
use App\Http\Requests\CreateNewsRequest;
use Illuminate\Support\Facades\App;

class NewsController extends Controller
{
    protected $_image_path = 'uploads/news/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest()->get();

        return view('admin.news.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
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
            'title_lt' => 'required|unique:news|max:255',
            'title_en' => 'required|unique:news|max:255',
            'title_ru' => 'required|unique:news|max:255',
            'body_lt' => 'required',
            'body_ru' => 'required',
            'body_en' => 'required',
         ]);

        if ($request->file('news_image')) {
            $file = $request->file('news_image');
            $path = $this->_image_path;
           
            $name = md5(microtime()).uniqid() . "_" .$file->getClientOriginalName();
            $name = str_replace(' ', '_', $name);

            $file->move($path, $name);
        }

        $new = new Article(array(
            'title_lt'=>$request->title_lt,
            'title_en'=>$request->title_en,
            'title_ru'=>$request->title_ru,
            'slug'  =>    str_slug($request->title_lt),
            'excerpt_lt'=> substr($request->body_lt, 0, 150),
            'excerpt_en'=> substr($request->body_en, 0, 150),
            'excerpt_ru'=> substr($request->body_ru, 0, 150),
            'body_lt'=>$request->body_lt,
            'body_en'=>$request->body_en,
            'body_ru'=>$request->body_ru,
            'image_name'=> $name,
            'image_path'=> $path
            ));

        $new->save();

        flash()->success('','Naujiena sukurta');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $locale = App::getLocale();

        $article = Article::where('slug', '=', $slug)->first();
        
        return view('pages.naujiena', compact('article', 'locale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        
        return view('admin.news.edit', compact('article'));
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
            'body_lt' => 'required',
            'body_ru' => 'required',
            'body_en' => 'required',
         ]);

        $article = Article::findOrFail($id);

        $article->title_lt = $request->title_lt;
        $article->title_en = $request->title_en;
        $article->title_ru = $request->title_ru;
        $article->slug = str_slug($request->title_lt);
        $article->excerpt_lt = substr($request->body_lt, 0, 150);
        $article->excerpt_en = substr($request->body_en, 0, 150);
        $article->excerpt_ru = substr($request->body_ru, 0, 150);
        $article->body_lt = $request->body_lt;
        $article->body_en = $request->body_en;
        $article->body_ru = $request->body_ru;

        if ($request->photo) {
                $tmp = $article->image_path.$article->image_name;
                if (file_exists($tmp)) {
                    unlink($tmp);
                }
                $file = $tmp;
                if(\File::isFile($file)){
                \File::delete($file);
                 }
                //$tmp->delete();
        }

        if ($request->file('news_image')) {
            $file = $request->file('news_image');
            $path = $this->_image_path;
           
            $name = md5(microtime()).uniqid() . "_" .$file->getClientOriginalName();
            $name = str_replace(' ', '_', $name);

            $file->move($path, $name);

            $article->image_path = $path;
            $article->image_name = $name;
        }


        $article->save();

        flash()->success('', 'Naujiena redaguota!');

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
        $article = Article::findOrFail($id);

        if($article){
            $file = $article->image_path.$article->image_name;

            if(\File::isFile($file)){
                \File::delete($file);
            }

           $article->delete();
          flash()->success('', 'Naujiena panaikinta!');
        } else{            
          flash()->error('', 'Naujiena nerasta!');
        }

        return redirect()->back();
    }

    public function frontIndex()
    {
        $locale = App::getLocale();

        $news = Article::latest('updated_at')->paginate(6);

        return view('pages.naujienos', compact('news', 'locale'));
    }
}
