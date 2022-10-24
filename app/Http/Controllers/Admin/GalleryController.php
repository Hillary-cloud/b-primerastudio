<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Category;
use Carbon\Carbon;
use App\Models\Image;
use Illuminate\Support\Facades\File;
// use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function index(Request $request){
        if ($request->has('category')) {
            $photos = Gallery::where('category_id',$request->category)->paginate(50);
            
        }else {
            $photos = Gallery::orderBy('created_at', 'DESC')->paginate(50); 
        };
        $categories = Category::all();
        
        return view('admin.photo',compact('photos','categories'));
    }

    
    public function create(){
        $categories = Category::all();
        return view('admin.add-photo',compact('categories'));
    }

    public function storePhoto(Request $request)
    {
       $this->validate($request,[
          'category_id' => 'required',
          'main_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
    ]); 
//adding main image
        if ($request->hasFile('main_image')) {
            $file = $request->file('main_image');
            $imageName = '-image-'.Carbon::now()->timestamp.'.'. rand(1,1000).'.'.$file->extension();
            $file->move(public_path('gallery_main_images'),$imageName);

            $photo = new Gallery;
            $photo->category_id = $request->category_id;
           
            $photo->status = 1;            
            $photo->main_image = $imageName;
            $photo->save();
        };
//adding sub images
        if($request->hasFile('images')){
            $files = $request->file('images');
            foreach($files as $file){
                $imageName = '-image-'.Carbon::now()->timestamp.'.'. rand(1,1000).'.'.$file->extension();
                $file->move(public_path('gallery_sub_images'),$imageName);
                Image::create([
                    'gallery_id'=>$photo->id,
                    'image'=>$imageName
                ]);
            }
        };
 
        return redirect()->back()->with('message', 'photo added successfully');
    }

    public function editPhoto($id){
        $photo = Gallery::find($id);
        $categories = Category::all();
        $images = Image::where('gallery_id',$photo->id)->get();
        return view('admin.edit-photo', compact('photo','categories','images'));
    }

    public function updatePhoto(Request $request, $id)
    {
        $this->validate($request,[
            'category_id' => 'required',
            'status' => 'required',
            // 'main_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
      ]); 

        $photo = Gallery::findOrFail($id);
        if ($request->hasFile('main_image')) {
            if (File::exists('gallery_main_images/'.$photo->main_image)) {
                File::delete('gallery_main_images/'.$photo->main_image);
            }
            $file = $request->file('main_image');
            $photo->main_image = '-image-'.Carbon::now()->timestamp.'.'. rand(1,1000).'.'.$file->extension();
            $file->move(\public_path('/gallery_main_images'),$photo->main_image);
            $request['main_image']=$photo->main_image;
        }
        $photo->update([
            'category_id'=>$request->category_id,
            'status'=>$request->status,
            'main_image'=>$photo->main_image,

        ]);

        if($request->hasFile('images')){
            $files = $request->file('images');
            foreach($files as $file){
                $imageName = '-image-'.Carbon::now()->timestamp.'.'. rand(1,1000).'.'.$file->extension();
                $file->move(public_path('gallery_sub_images'),$imageName);
                Image::create([
                    'gallery_id'=>$photo->id,
                    'image'=>$imageName
                ]);
            }
        };
        return redirect()->back()->with('message', 'Photo updated successfully');
    }

    public function deleteSubImage($id){
        $images = Image::findOrFail($id);
        if (File::exists('gallery_sub_images/'.$images->image)) {
            File::delete('gallery_sub_images/'.$images->image);
        }
        Image::find($id)->delete();
        return back();
    }

    public function deletePhoto($id){
        $photo = Gallery::find($id);
        if (File::exists('gallery_main_images/'.$photo->main_image)) {
            File::delete('gallery_main_images/'.$photo->main_image);
        }
        $images = Image::where('gallery_id',$photo->id)->get();
        foreach ($images as $image) {
            if (File::exists('gallery_sub_images/'.$image->image)) {
                File::delete('gallery_sub_images/'.$image->image);
            }
        
        }
        $photo->delete();

        return redirect()->back()->with('message','Photo removed successfully');
    }

    public function viewPhoto($id){
        $photo = Gallery::where('id',$id)->first();
        if(!$photo) abort(404);
        $images = Image::where('gallery_id',$photo->id)->get();
        return view('admin.view-photo',compact('photo','images'));
    }

}
