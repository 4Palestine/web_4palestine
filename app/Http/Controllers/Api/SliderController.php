<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index(){
        $sliders = Slider::where('is_active' , '=' , 1)->orderBy('order','DESC')->get();
        if($sliders->count() > 0){
            foreach($sliders as $slider){
                $data[] = [
                    'status' => 200 ,
                    'message' => [
                        'id' => $slider->id ,
                        'is_active' => $slider->is_active,
                        'mockups' => image_url($slider->mockups),
                        'order' => $slider->order,
                        'created_at' => $slider->created_at,
                        'updated_at' => $slider->updated_at,
                    ] ,
                ];
            }
            return response()->json($data , 200);
        } else {
            $data = [
                'status' => 404 ,
                'message' => "No Student Found" ,
            ];
            return response()->json($data , 404);
        }
    }
}
