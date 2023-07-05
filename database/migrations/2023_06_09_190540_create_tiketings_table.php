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
        Schema::create('tiketings', function (Blueprint $table) {
            $table->id();
            $table->string('concert_name');
            $table->string('address');
            $table->string('gate');
            $table->integer('seat');
            $table->date('date');
            $table->integer('price');
            $table->integer('qty')->default(1);
            $table->string('image')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });

        Schema::table('tiketings', function ($table) {
            $table->foreign('user_id')->references('id')->on('users');

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tiketings');
    }
};
