<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
 
    public function up(): void
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('status')->default(true);

            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('products')->onDelete('cascade');

            $table->timestamps();
        });

        
    }

 
    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
