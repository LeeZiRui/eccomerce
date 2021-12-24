<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index(){
        return view('admin.slider.index');
    }
    public function create(){
        return view('admin.slider.create');
    }
    public function edit(Slider $slider){
        return view('admin.slider.edit',compact('slider'));
    }
    public function store(Request $request){
        $data = $request->except('_token');
        $this->validate($request,[
            'image' =>  'required|image'
        ]);
        $data['image'] = Storage::disk('public')->put('images',$request->file('image'));
        Slider::query()->create($data);
        return redirect('admin/sliders');
    }
    public function update(Slider $slider, Request $request){
        $data = $request->except('_token');
        $this->validate($request,[
            'image' =>  'sometimes|image'
        ]);
        if ($request->hasFile('image'))
            $data['image'] = Storage::disk('public')->put('images',$request->file('image'));
        $slider->update($data);
        return redirect('admin/sliders');
    }
    public function destroy(Slider $slider){
        $slider->delete();
        return redirect('admin/sliders');
    }

}
