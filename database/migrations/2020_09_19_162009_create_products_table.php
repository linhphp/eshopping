<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cate_id');
            $table->unsignedBigInteger('brand_id');
            $table->string('name');
            $table->float('unit_price',30,2);
            $table->float('promotion_price',30,2);
            $table->text('image');
            $table->text('desc');
            $table->longText('content');
            $table->integer('status');
            $table->integer('quantity');
            $table->softDeletes('deleted_at', 0)->nullable();
            $table->foreign('cate_id')->references('id')->on('category_products');
            $table->foreign('brand_id')->references('id')->on('brand_products');
            
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
        Schema::dropIfExists('products');
    }
}
