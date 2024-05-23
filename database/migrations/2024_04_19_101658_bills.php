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
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_order');
            $table->foreign('id_order')->references('id')->on('orders')->onDelete('cascade');
            $table->string('name');
            $table->string('surname');
            $table->unsignedBigInteger('card_number');
            $table->string('country');
            $table->string('city');
            $table->string('address');
            $table->string('province');
            $table->unsignedBigInteger('postal_code');
            $table->date('payment_date');
            $table->unsignedBigInteger('identification_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
