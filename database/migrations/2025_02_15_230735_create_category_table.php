<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('category', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("size");
            $table->unsignedBigInteger("category_id");
            $table->foreign("category_id")->references("id")->on("products")->onDelete("cascade")->onUpdate("cascade");
            $table->timestamps();
  
        


        });
    }

  
    public function down(): void
    {
        Schema::dropIfExists('category');
    }
};
