<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TagController extends Controller
{
    public function index(){
        $items = Tag::all();
        return view('admin.tag.index',compact('items'));
    }
    public function create(){
        return view('admin.tag.create');
    }
    public function store(Request  $request){
        $this->validate($request,[
            'title_ar'      =>  'required',
            'title_en'      =>  'required',
        ]);
        $data= $request->only('title_ar','title_en');

        Tag::query()->create($data);
        return redirect()->route('admin.tags.index');
    }
    public function edit($id){
        $item = Tag::query()->find($id);
        return view('admin.tag.edit',compact('item'));
    }
    public function update(Request  $request,$id){
        $this->validate($request,[
            'title_ar'      =>  'required',
            'title_en'      =>  'required',
        ]);
        $data= $request->only('title_ar','title_en');

        Tag::query()->find($id)->update($data);
        return redirect()->route('admin.tags.index');
    }
    public function destroy($id){
        Tag::query()->find($id)->delete();
        return redirect()->route('admin.tags.index');
    }
}
