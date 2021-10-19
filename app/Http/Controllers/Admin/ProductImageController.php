<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use App\Models\ProductProp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
{
    public function destroy($id){
        ProductImage::query()->find($id)->delete();
        return back();
    }
    public function store(Request  $request){
        $this->validate($request,[
            'image' =>  'required|image'
        ]);
        $data = $request->except('_token','image');
        $data['path'] = Storage::disk('public')->put('images',$request->file('image'));
        ProductImage::query()->create($data);
        return back();
    }
}
