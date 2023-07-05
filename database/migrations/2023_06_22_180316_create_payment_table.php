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
        Schema::create('payments', function (Blueprint $table) {
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
            $table->unsignedBigInteger('tiketing_id');
            $table->bigInteger('total_price');
            $table->enum('status', ['Unpaid','Paid']);
            $table->timestamps();
        });

        Schema::table('payments', function ($table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('tiketing_id')->references('id')->on('tiketings');

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
