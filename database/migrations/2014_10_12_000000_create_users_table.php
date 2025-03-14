<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role', ['admin', 'user', 'employee'])->default('user');
            $table->string('address')->nullable();
            $table->string('Mobile_Number', 25)->nullable();
            $table->timestamps();
        });

        DB::table('users')->insert([
            ['name' => 'Mark John Calayca', 'email' => 'markjohncalayca@gmail.com', 'password' => bcrypt('password'), 'role' => 'admin'],
            ['name' => 'Jane Smith', 'email' => 'janesmith@gmail.com', 'password' => bcrypt('password'), 'role' => 'user'],
            ['name' => 'John Doe', 'email' => 'johndoe@gmail.com', 'password' => bcrypt('password'), 'role' => 'employee']
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
