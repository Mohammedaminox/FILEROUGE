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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_number')->unique();        //room numbre
            $table->string('image');                       //room image
            $table->enum('room_type', ['single', 'double', 'suite']);          //room type (par exemple, simple, double, suite)
            $table->integer('floor');                    //Le numéro de l'étage où se trouve la chambre
            $table->text('description')->nullable();
            $table->enum('status', ['vacant', 'occupied', 'under_maintenance'])->default('vacant');
            $table->boolean('availability')->default(true);
            $table->decimal('price', 8, 2);
            $table->integer('max_occupancy');
            $table->dateTime('check_in_date')->nullable();
            $table->dateTime('check_out_date')->nullable();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
