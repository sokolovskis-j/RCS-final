<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up(): void
    {
        DB::table("users")
            ->insert([
                "email" => "janis.sokolovskis24@gmail.com",
                "name" => "Janis Sokolovskis",
                "password" => bcrypt("password")
            ]);
    }

    /**
     * Reverse the migrations.
     * 
     * @return void
     */
    public function down(): void
    {
        DB::table("users")->where("email", "=", "janis.sokolovskis24@gmail.com")->delete();
    }
};
