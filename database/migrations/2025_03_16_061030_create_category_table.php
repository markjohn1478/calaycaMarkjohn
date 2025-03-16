<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->timestamps();
        });

        // Insert Data
        DB::table('category')->insert([
            ['name' => 'spongebob', 'description' => 't-shirts items'],
            ['name' => 'stickers', 'description' => 'motor assersories'],
            ['name' => 'birthday mug', 'description' => 'customized'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('category');
    }
};

