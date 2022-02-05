<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function getColorAttribute(){
        return app()->getLocale() == "ar" ? $this->color_ar:$this->color_en;
    }
}
