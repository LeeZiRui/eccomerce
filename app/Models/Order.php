<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function items(){
        return $this->hasMany(OrderItem::class,'order_id','id');
    }
    public function tracks(){
        return $this->hasMany(OrderTrack::class,'order_id','id');
    }
    public function getDateAttribute()
    {
        return $this->created_at->format('Y-m-d');
    }
    public function getTimeAttribute()
    {
        return $this->created_at->format('h:i');
    }
}
