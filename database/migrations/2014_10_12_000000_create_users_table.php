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
            $table->string('name');  // Menambahkan kolom name
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->enum('gender', ['male', 'female']);
            $table->json('hobby');  // Kolom hobi menggunakan tipe JSON
            $table->string('telp');
            $table->string('city');
            $table->text('reason');
            $table->boolean('is_admin')->default(false);
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
