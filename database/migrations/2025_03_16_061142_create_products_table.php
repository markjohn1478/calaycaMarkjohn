<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->integer('price');
            $table->text('description');
            $table->unsignedBigInteger('category_id');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');
        });

        // Insert Data
        DB::table('products')->insert([
            ['product_name' => 'stickers', 'price' => 1500, 'description' => 'printed', 'category_id' => 1],
            ['product_name' => 'T-shirt', 'price' => 20, 'description' => '100% cotton', 'category_id' => 2],
            ['product_name' => 'headband', 'price' => 500, 'description' => 'Comfortable', 'category_id' => 3],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
