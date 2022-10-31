<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Category;
use App\Models\Image;
use App\Models\Collage;

class HomeController extends Controller
{
    public function index(){
        $photos = Gallery::where('status','1')->orderBy('created_at', 'DESC')->paginate(12);
        $collages = Collage::where('status','1')->orderBy('created_at', 'DESC')->get();
        return view('index',compact('photos','collages'));
    }

    public function about(){
        return view('about');
    }

    public function viewPhotoDetails($id){
        $photo = Gallery::where('id',$id)->first();
        $images = Image::where('gallery_id',$photo->id)->get();
        return view('view-photo-details',compact('photo','images'));
    }

    public function allPhotos(Request $request){
        if ($request->has('category')) {
            $photo = Gallery::where('category_id',$request->category)->where('status','1')->paginate(50);
            
        }else {
            $photo = Gallery::where('status','1')->paginate(50);
        };
        $categories = Category::all();
        return view('photos',compact('photo','categories'));
        
    }
}
