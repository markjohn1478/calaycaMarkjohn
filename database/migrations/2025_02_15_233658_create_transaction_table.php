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
            $table->unsignedBigInteger('user_id');
            $table->integer('price');
            $table->string('type');
            $table->timestamp('date_completed')->nullable();
            $table->string('contact_number', 11);
            $table->string('Address');
            $table->timestamp('pickup_date')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        DB::table('transaction')->insert([
            ['user_id' => 1, 'price' => 2500, 'type' => 'Online Payment', 'contact_number' => '09265612966', 'Address' => 'Zone 12 b zayas upper carmen'],
            ['user_id' => 2, 'price' => 800, 'type' => 'Cash on Delivery', 'contact_number' => '0958462544', 'Address' => 'Taga asa'],
            ['user_id' => 3, 'price' => 600, 'type' => 'Credit Card', 'contact_number' => '0965258744', 'Address' => 'Ikaw asa']
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('transaction');
    }
};

