<?php


namespace App\Repositories;


use Illuminate\Support\Facades\DB;

class ProductRepository
{
    protected $table = 'products';
    public function dbLimit($count)
    {
        return DB::table($this->table)->limit($count)->pluck('price');
    }
}
