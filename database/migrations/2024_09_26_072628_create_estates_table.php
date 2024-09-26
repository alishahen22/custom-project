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
        Schema::create('estates', function (Blueprint $table) {
            $table->id();
            //stpe 1
            $table->string('name');
            $table->integer('area');
            $table->integer('rooms');
            $table->integer('baths');
            $table->enum('type', ['single','marriage' , 'both']);
            $table->enum('finishing', ['deluxe','super_lux','lux','medium','simple']);
            $table->text('desc');
            $table->foreignId('category_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            //step 2
            $table->foreignId('city_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->text('address');
            $table->text('landmarks');
                            //step 3
            $table->string('feature_ids')->nullable();
                            //step 4
            $table->string('arrival_time');
            $table->string('departure_time');
            $table->integer('insurance_amount');
            $table->integer('price');
            $table->integer('cancellation_policy');
            $table->longText('booking_conditions')->nullable();
                           //step 5
            $table->string('tourism_ministry')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->enum('status', ['approved','disapproved','pending'])->default('pending');
            $table->enum('step', ['1','2','3','4','5','6'])->default('1');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estates');
    }
};
