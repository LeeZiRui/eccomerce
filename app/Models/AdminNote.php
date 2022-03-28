<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminNote extends Model
{
    use HasFactory;
    protected $guarded =[];
    public static function send($title,$content){
        static::query()->create(compact('title','content'));
    }
}
