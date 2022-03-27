<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(){
        $data = $this->validate(\request(),[
            'name'  =>  'required',
            'email'  =>  'required|email',
            'subject'  =>  'required',
            'message'  =>  'required',
        ]);
        Contact::query()->create($data);
        return back()->withSuccess('تم ارسال الرسالة بنجاح');
    }
}
