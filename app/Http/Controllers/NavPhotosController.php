<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MenuPhoto;
use App\Http\Requests;

class NavPhotosController extends Controller
{
    protected $_image_path = 'uploads/nav-photos/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function frontIndex()
    {
        $photos = MenuPhoto::all();

        return view('pages.index', compact('photos'));
    }

    public function news()
    {
        $photo = MenuPhoto::where('category', '=', 'naujienos')->first();

        return view('admin.nav-images.news', compact('photo'));
    }

    public function postNews(Request $request, $id)
    {


        $photo = MenuPhoto::findOrFail($id);

        if ($request->naujienos_photo) {
                $tmp = $photo->image_path.$photo->image_name;
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

            $photo->image_path = $path;
            $photo->image_name = $name;
        }


        $photo->save();

        flash()->success('', 'Nuotrauka atnaujinta!');

        return redirect()->back();
    }


    public function wallpapers()
    {
        $photo = MenuPhoto::where('category', '=', 'tapetai')->first();

        return view('admin.nav-images.wallpapers', compact('photo'));
    }

    public function postWallpapers(Request $request, $id)
    {


        $photo = MenuPhoto::findOrFail($id);

        if ($request->tapetu_photo) {
                $tmp = $photo->image_path.$photo->image_name;
                if (file_exists($tmp)) {
                    unlink($tmp);
                }
                $file = $tmp;
                if(\File::isFile($file)){
                \File::delete($file);
                 }
        }

        if ($request->file('wallpapers_image')) {
            $file = $request->file('wallpapers_image');
            $path = $this->_image_path;
           
            $name = md5(microtime()).uniqid() . "_" .$file->getClientOriginalName();
            $name = str_replace(' ', '_', $name);

            $file->move($path, $name);

            $photo->image_path = $path;
            $photo->image_name = $name;
        }


        $photo->save();

        flash()->success('', 'Nuotrauka atnaujinta!');

        return redirect()->back();
    }

    public function fabrics()
    {
        $photo = MenuPhoto::where('category', '=', 'audiniai')->first();

        return view('admin.nav-images.fabrics', compact('photo'));
    }

    public function postFabrics(Request $request, $id)
    {


        $photo = MenuPhoto::findOrFail($id);

        if ($request->audiniu_photo) {
                $tmp = $photo->image_path.$photo->image_name;
                if (file_exists($tmp)) {
                    unlink($tmp);
                }
                $file = $tmp;
                if(\File::isFile($file)){
                \File::delete($file);
                 }
        }

        if ($request->file('fabrics_image')) {
            $file = $request->file('fabrics_image');
            $path = $this->_image_path;
           
            $name = md5(microtime()).uniqid() . "_" .$file->getClientOriginalName();
            $name = str_replace(' ', '_', $name);

            $file->move($path, $name);

            $photo->image_path = $path;
            $photo->image_name = $name;
        }


        $photo->save();

        flash()->success('', 'Nuotrauka atnaujinta!');

        return redirect()->back();
    }

    public function flooring()
    {
        $photo = MenuPhoto::where('category', '=', 'parketlentes')->first();

        return view('admin.nav-images.flooring', compact('photo'));
    }

    public function postFlooring(Request $request, $id)
    {


        $photo = MenuPhoto::findOrFail($id);

        if ($request->parketlenciu_photo) {
                $tmp = $photo->image_path.$photo->image_name;
                if (file_exists($tmp)) {
                    unlink($tmp);
                }
                $file = $tmp;
                if(\File::isFile($file)){
                \File::delete($file);
                 }
        }

        if ($request->file('flooring_image')) {
            $file = $request->file('flooring_image');
            $path = $this->_image_path;
           
            $name = md5(microtime()).uniqid() . "_" .$file->getClientOriginalName();
            $name = str_replace(' ', '_', $name);

            $file->move($path, $name);

            $photo->image_path = $path;
            $photo->image_name = $name;
        }


        $photo->save();

        flash()->success('', 'Nuotrauka atnaujinta!');

        return redirect()->back();
    }

    public function accessories()
    {
        $photo = MenuPhoto::where('category', '=', 'aksesuarai')->first();

        return view('admin.nav-images.accessories', compact('photo'));
    }

    public function postAccessories(Request $request, $id)
    {


        $photo = MenuPhoto::findOrFail($id);

        if ($request->aksesuaru_photo) {
                $tmp = $photo->image_path.$photo->image_name;
                if (file_exists($tmp)) {
                    unlink($tmp);
                }
                $file = $tmp;
                if(\File::isFile($file)){
                \File::delete($file);
                 }
        }

        if ($request->file('accessories_image')) {
            $file = $request->file('accessories_image');
            $path = $this->_image_path;
           
            $name = md5(microtime()).uniqid() . "_" .$file->getClientOriginalName();
            $name = str_replace(' ', '_', $name);

            $file->move($path, $name);

            $photo->image_path = $path;
            $photo->image_name = $name;
        }


        $photo->save();

        flash()->success('', 'Nuotrauka atnaujinta!');

        return redirect()->back();
    }

    public function contacts()
    {
        $photo = MenuPhoto::where('category', '=', 'kontaktai')->first();

        return view('admin.nav-images.contacts', compact('photo'));
    }

    public function postContacts(Request $request, $id)
    {


        $photo = MenuPhoto::findOrFail($id);

        if ($request->kontaktu_photo) {
                $tmp = $photo->image_path.$photo->image_name;
                if (file_exists($tmp)) {
                    unlink($tmp);
                }
                $file = $tmp;
                if(\File::isFile($file)){
                \File::delete($file);
                 }
        }

        if ($request->file('contacts_image')) {
            $file = $request->file('contacts_image');
            $path = $this->_image_path;
           
            $name = md5(microtime()).uniqid() . "_" .$file->getClientOriginalName();
            $name = str_replace(' ', '_', $name);

            $file->move($path, $name);

            $photo->image_path = $path;
            $photo->image_name = $name;
        }


        $photo->save();

        flash()->success('', 'Nuotrauka atnaujinta!');

        return redirect()->back();
    }
}
