<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSlide;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class HomeSlideController extends Controller
{
    public function homeSlider(){
        $homeSlide = HomeSlide::find(1);
        return view('admin.home_Slide.home_slide_all', compact('homeSlide'));
    }//End Method

    public function updateSlider(Request $request){

        $slide_id = $request->id;
        if ($request->file('home_slide')){
            $manager = new ImageManager(new Driver());
            $image = $request->file('home_slide');
            $name_gen =hexdec(uniqid()). '.'. $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(370,246);

            $img->toJpeg(80)->save(base_path('public/upload/home_slide/'.$name_gen));
            $save_url = 'upload/home_slide/'.$name_gen;

            HomeSlide::findOrFail($slide_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,
                'home_slide' => $save_url

            ]);

            $notification =[
                'message'=> 'Updated Successfully',
                'alert-type'=> 'success'
            ];

            return redirect()->back()->with($notification);
        }else{
            HomeSlide::findOrFail($slide_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,


            ]);
            $notification =[
                'message'=> 'Home Slide Updated Without Image Successfully',
                'alert-type'=> 'success'
            ];

            return redirect()->back()->with($notification);
        }//End Else

    }//End Method
}
