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
            $table->id('userid'); // Automatically generated user ID
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('usertype')->default('customer'); // Automatically assign 'customer'
            $table->timestamp('registration')->useCurrent(); // Automatically assign registration time
            $table->timestamps(); // 'created_at' and 'updated_at' columns
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

