<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;

class SliderController extends Controller
{
    public function create(){

        return view('admin.slider.create');
    }

    public function store(Request $request){
        $data = New Slider;
        $data ->slide_name = $request->slide_name;
        $data ->slide_desc = $request->slide_desc;
        if($request->hasfile('slide_image')){
           
                $file = $request->file('slide_image');
           
                if($file->getClientOriginalExtension('slide_image') == 'jpg' || $file->getClientOriginalExtension('slide_image') == 'JPG' || $file->getClientOriginalExtension('slide_image') == 'png' || $file->getClientOriginalExtension == 'PNG'){
           
                    $file_name = $file->getClientOriginalName('slide_image');
          
                    $file->move('upload/product',$file_name);
            
                    $data->slide_image = $file_name;
                }
            
                else {
                    $data->slide_image = 'null';
                }
            
            }
            else {
                $data->slide_image = 'null';
            }
            
            $data->save();
            return redirect()->back()->with('message', 'Thêm slider thành công');
        
    }
}
