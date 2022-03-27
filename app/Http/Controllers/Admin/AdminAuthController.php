<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class AdminAuthController extends Controller
{
    public function form(){
        if (Admin::query()->count() == 0)
            Admin::query()->create([
                'name'  =>  'admin',
                'code'  =>  '123',
                'password'  => bcrypt('123'),
            ]);
        return view('admin.login');
    }
    public function login(){
        $data = $this->validate(\request(),[
            'code' =>  'required|exists:admins',
            'password' => ['required'],
        ]);
        if (auth('admin')->attempt($data)){
            return redirect()->intended('/admin');
        }else{
            return  back()->with('error','invalid');
        }
    }
}
