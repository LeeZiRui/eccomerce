<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductProp;
use Illuminate\Http\Request;

class ProductPropController extends Controller
{
    public function destroy($id){
        ProductProp::query()->find($id)->delete();
        return back();
    }
    public function update(Request  $request,$id){
        ProductProp::query()->find($id)->update($request->except('_token','_method'));
        return back();
    }
}
