<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->integer('price');
            $table->string('type');
            $table->timestamp('date_completed')->nullable();
            $table->string('contact_number', 11);
            $table->string('address');
            $table->date('pickup_date')->nullable();
            $table->timestamps();
        });

        DB::table('transaction')->insert([
            ['user_id' => 1, 'price' => 500, 'type' => 'Online Payment', 'date_completed' => now(), 'contact_number' => '09235612966', 'address' => 'Zone 12 b carmen', 'pickup_date' => '2025-04-01'],
            ['user_id' => 2, 'price' => 300, 'type' => 'Cash on Delivery', 'date_completed' => now(), 'contact_number' => '0987654321', 'address' => 'taga asa', 'pickup_date' => '2025-04-02'],
            ['user_id' => 3, 'price' => 200, 'type' => 'Bank Transfer', 'date_completed' => now(), 'contact_number' => '0985745211', 'address' => 'sa imong heart', 'pickup_date' => '2025-04-03'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('transaction');
    }
};


