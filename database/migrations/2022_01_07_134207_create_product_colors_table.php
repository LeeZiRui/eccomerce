<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_colors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->string('color_ar');
            $table->string('color_en');
            $table->timestamps();
        });
        Schema::table('products',function (Blueprint  $blueprint){
            $blueprint->dropColumn('quantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_colors');
        Schema::table('products',function (Blueprint  $blueprint){
            $blueprint->integer('quantity')->default(0);
        });
    }
}
