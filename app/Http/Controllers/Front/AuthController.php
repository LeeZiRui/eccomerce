<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function register(){
        $data = $this->validate(\request(),[
            'name'  =>  'required',
            'email' =>  'required|unique:users',
            'password' => ['required',Password::min(6)->mixedCase()->symbols()],
            'phone' =>  'required|unique:users',
        ]);
        $data['password'] = bcrypt($data['password']);
        $user = User::query()->create($data);
        auth()->loginUsingId($user->id);
        return redirect()->intended('/');
    }
    public function login(){
        $data = $this->validate(\request(),[
            'email' =>  'required|exists:users',
            'password' => ['required',Password::min(6)->mixedCase()->symbols()],
        ]);
        $carts = carts();
        if (auth()->attempt($data)){
            if ($carts->count()) {
                foreach ($carts as $item)
                    carts(['product' => $item->product, 'quantity' => $item->quantity], $item->size, $item->color);
                session()->forget('carts_');
            }
            return redirect()->intended('/');
        }
        return back()->withErrors(['auth'=>"Wrong Data"]);
    }
    public function logout(){
        auth()->logout();
        return redirect('/');
    }
}
