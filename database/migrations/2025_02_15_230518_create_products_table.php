<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->integer('price');
            $table->text('description');
            $table->string('image')->nullable();
            $table->timestamps();
        });

        DB::table('products')->insert([
            ['product_name' => 'Sponge Bob Design', 'price' => 1500, 'description' => 'none', 'image' => 'sb.jpg'],
            ['product_name' => 'Ben 10 Design', 'price' => 800, 'description' => 'none', 'image' => 'b10.jpg'],
            ['product_name' => 'Super Mario Design', 'price' => 200, 'description' => 'none', 'image' => 'sp.jpg']
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
