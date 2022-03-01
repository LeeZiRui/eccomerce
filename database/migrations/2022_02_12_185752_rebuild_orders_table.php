<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RebuildOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('orders');
        Schema::create('orders',function (Blueprint $table){
            $table->id();
            $table->string('full_name');
            $table->string('full_address');
            $table->string('phone');
            $table->string('email');
            $table->float('sub_total');
            $table->enum('status',[
                'pending',
                'shipping',
                'rejected',
                'delivered',
                'closed',
            ])->default('pending');
            $table->text('status_notes')->nullable();
            $table->float('total');
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });
        Schema::create('order_items',function (Blueprint $table){
            $table->id();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            $table->foreignId('product_id')->nullable()->constrained()->nullOnDelete();
            $table->string('product_name');
            $table->double('product_price');
            $table->double('sub_total');
            $table->unsignedBigInteger('quantity')->default(1);
            $table->string('chosen_color')->nullable();
            $table->string('chosen_size')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('orders');
    }
}
