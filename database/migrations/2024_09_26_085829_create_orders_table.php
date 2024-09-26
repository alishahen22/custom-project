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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['pending', 'accepted', 'rejected', 'canceled', 'completed'])->default('pending');

            $table->string('order_number')->unique();
            $table->string('payment_method')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('merchant_id')->nullable();
            $table->foreignId('owner_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // user who made the order
            $table->foreignId('estate_id')->constrained('estates')->onDelete('cascade');
            $table->dateTime('start_at');
            $table->dateTime('end_at');
            $table->integer('total_price');
            $table->boolean('has_offer')->default(false);
            $table->foreignId('offer_id')->nullable()->constrained('offers')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
