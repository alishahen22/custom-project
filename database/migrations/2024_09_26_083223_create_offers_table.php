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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->enum('type', ['fixed', 'percentage']);
            $table->integer('value');
            $table->dateTime('start_at');
            $table->dateTime('end_at');
            $table->string('days');

            $table->enum('status', ['active', 'inactive'])->default('inactive');
            $table->foreignId('estate_id')->constrained('estates')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
