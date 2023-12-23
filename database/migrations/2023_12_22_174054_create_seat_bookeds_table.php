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
        Schema::create('seat_bookeds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->restrictOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('trip_id');
            $table->foreign('trip_id')->references('id')->on('trips')->restrictOnDelete()->cascadeOnUpdate();
			$table->smallInteger( 'price' );
			$table->tinyInteger( 'seat_quantity' );
			$table->integer( 'total_price' );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seat_bookeds');
    }
};
