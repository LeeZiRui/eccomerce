<?php

namespace App\Models;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];



    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function tags(){
        return $this->belongsToMany(Tag::class,'product_tags','product_id','tag_id');
    }
    public function sizes(){
        return $this->belongsToMany(CategorySize::class,'product_sizes','product_id','category_size_id');
    }
    public function props(){
        return $this->hasMany(ProductProp::class,'product_id','id');
    }
    public function colors(){
        return $this->hasMany(ProductColor::class,'product_id','id');
    }
    public function images(){
        return $this->hasMany(ProductImage::class,'product_id','id');
    }
    public function getTitleAttribute(){
        return app()->getLocale() == "ar" ? $this->title_ar:$this->title_en;
    }
    public function getDescriptionAttribute(){
        return app()->getLocale() == "ar" ? $this->description_ar:$this->description_en;
    }
    protected static function newFactory()
    {
        return ProductFactory::new();
    }

}
