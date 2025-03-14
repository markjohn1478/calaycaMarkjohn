<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->integer('Quantity');
            $table->string('customize_image')->nullable();
            $table->string('customize_color')->nullable();
            $table->text('description')->nullable();
            $table->string('size')->nullable();
            $table->string('status')->default('pending');
            $table->tinyInteger('completed')->default(0);
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });

        DB::table('carts')->insert([
            ['product_id' => 1, 'Quantity' => 2, 'customize_color' => 'Black', 'status' => 'pending', 'completed' => 0],
            ['product_id' => 2, 'Quantity' => 1, 'customize_color' => 'Blue', 'status' => 'pending', 'completed' => 0],
            ['product_id' => 3, 'Quantity' => 3, 'customize_color' => 'Red', 'status' => 'pending', 'completed' => 0]
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('carts');
    }
};
