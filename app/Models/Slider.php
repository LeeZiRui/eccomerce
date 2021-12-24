<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function getBigTitleAttribute(){
        return app()->getLocale() == "en" ? $this->big_title_en : $this->big_title_ar ;
    }
    public function getSmallTitleAttribute(){
        return app()->getLocale() == "en" ? $this->small_title_en : $this->small_title_ar ;
    }
}
