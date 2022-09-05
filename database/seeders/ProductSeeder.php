<?php

namespace Database\Seeders;

use App\Models\CartItem;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ProductSeeder extends Seeder
{

    public function tempProduct($cat,$i){

        return [
            'category_id' => $cat->id,
            'main_image' => '#',
            'title_en' => 'product'.$i,
            'title_ar' => 'منتج'.$i,
            'description_en' => 'test',
            'description_ar' => 'تجربة',
            'price' => rand(100,99999),
        ];
    }
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Product::query()->truncate();
        $cat = Category::query()->first();
        // seeding with factory
//        Product::factory()->for($cat)->count(50000)->create();
        // seeding with for loops
//        for ($i = 0; $i < 50000; $i++) {
//            Product::query()->create($this->tempProduct($i));
//        }
        // new way seeding with chunks and insert
        $products = [];
        for ($i = 0; $i < 50000; $i++) {
            $products[] = $this->tempProduct($cat,$i);
        }
        foreach (array_chunk($products, 1000) as $chunk) {
            Product::query()->insert($chunk);
        }
        Schema::enableForeignKeyConstraints();
    }
}
