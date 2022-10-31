<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Collage;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class CollageController extends Controller
{
    public function index(){
        $collages = Collage::orderBy('created_at', 'DESC')->paginate(20); 
        return view('admin.collage',compact('collages'));
    }
    public function create(){
        return view('admin.add-collage');
    }

    public function storeCollage(Request $request)
    {
       $this->validate($request,[
          'collage_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
    ]); 
//adding collage image
        if ($request->hasFile('collage_image')) {
            $file = $request->file('collage_image');
            $imageName = '-image-'.Carbon::now()->timestamp.'.'. rand(1,1000).'.'.$file->extension();
            $file->move(public_path('collage_images'),$imageName);

            $collage = new Collage;
           
            $collage->status = 1;            
            $collage->collage_image = $imageName;
            $collage->save();
        };
 
        return redirect()->back()->with('message', 'collage added successfully');
    }

    public function editcollage($id){
        $collage = Collage::find($id);
        return view('admin.edit-collage', compact('collage'));
    }

    public function updateCollage(Request $request, $id)
    {
        $this->validate($request,[
            'status' => 'required',
            // 'collage_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
      ]); 

        $collage = Collage::findOrFail($id);
        if ($request->hasFile('collage_image')) {
            if (File::exists('collage_images/'.$collage->collage_image)) {
                File::delete('collage_images/'.$collage->collage_image);
            }
            $file = $request->file('collage_image');
            $collage->collage_image = '-image-'.Carbon::now()->timestamp.'.'. rand(1,1000).'.'.$file->extension();
            $file->move(\public_path('/collage_images'),$collage->collage_image);
            $request['collage_image']=$collage->collage_image;
        }
        $collage->update([
            'status'=>$request->status,
            'collage_image'=>$collage->collage_image,

        ]);

        return redirect()->back()->with('message', 'collage updated successfully');
    }

    public function deleteCollage($id){
        $collage = Collage::find($id);
        if (File::exists('collage_images/'.$collage->collage_image)) {
            File::delete('collage_images/'.$collage->collage_image);
        }
      
        $collage->delete();

        return redirect()->back()->with('message','collage removed successfully');
    }

 
}
