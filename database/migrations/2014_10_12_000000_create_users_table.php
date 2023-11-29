<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role')->default('user');
            $table->rememberToken();
            $table->timestamps();
        });

        $users = [
            ["name" => "Joao Silva", "email" => "admin@admin.com", "password" => Hash::make("adminAdmin"), "role" => "admin"],
            ["name" => "Maria Freitas", "email" => "Mfreitas@hotmail.com", "password" => Hash::make("mariapassword"), "role" => "worker"],
            ["name" => "Ricardo Miguel", "email" => "ricardao@gmail.com", "password" => Hash::make("megarick2000"), "role" => "user"],
            ["name" => "Francisco Dias", "email" => "Fdias@gmail.com", "password" => Hash::make("franciscodias"), "role" => "user"],
            ["name" => "Mariana Pinto", "email" => "marianaP@gmail.com", "password" => Hash::make("marianapinto"), "role" => "user"],
            ["name" => "Laura Mata", "email" => "lauraM2000@gmail.com", "password" => Hash::make("lauramata"), "role" => "user"],
            ["name" => "Diogo Ramos", "email" => "Dramos@gmail.com", "password" => Hash::make("diogoramos"), "role" => "user"],
        ];

        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
