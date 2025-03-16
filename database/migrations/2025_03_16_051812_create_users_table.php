<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });

        // Insert data
        DB::table('users')->insert([
            ['name' => 'Mark John Calayca', 'email' => 'markjohncalauca@gmail.com', 'password' => bcrypt('password')],
            ['name' => 'Jane Doe', 'email' => 'janedoe@gmail.com', 'password' => bcrypt('password')],
            ['name' => 'Alice Smith', 'email' => 'alicesmith@gmail.com', 'password' => bcrypt('password')],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};

