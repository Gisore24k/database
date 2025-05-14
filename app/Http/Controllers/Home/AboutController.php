<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AboutController extends Controller
{

    public function aboutPage(){
        $aboutPage = About::find(1);

        return view('admin.about_page.about_page_all', compact('aboutPage'));
    }//End Method

     public function updateAbout(Request $request){

        $about_id = $request->id;
        if ($request->file('about_image')){
            $manager = new ImageManager(new Driver());
            $image = $request->file('about_image');
            $name_gen =hexdec(uniqid()). '.'. $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(523,605);

            $img->toJpeg(80)->save(base_path('public/upload/home_about/'.$name_gen));
            $save_url = "upload/home_about/{$name_gen}";

            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'about_image' => $save_url,


            ]);

            $notification =[
                'message'=> 'About Page Updated Successfully',
                'alert-type'=> 'success'
            ];

            return redirect()->back()->with($notification);
        }else{
            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,

            ]);
            $notification =[
                'message'=> 'About Page Updated Without Image Successfully',
                'alert-type'=> 'success'
            ];

            return redirect()->back()->with($notification);
        }//End Else

    }//End Method
    public function homeAbout(){
        $homeAbout = About::find(1);
        return view('frontend.about_page', compact('homeAbout'));
    }//End Method

}
