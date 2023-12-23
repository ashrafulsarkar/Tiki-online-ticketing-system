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
        Schema::create('bus_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bus_id');
            $table->foreign('bus_id')->references('id')->on('buses')->restrictOnDelete()->cascadeOnUpdate();
            $table->string('from_location');
            $table->foreign('from_location')->references('location')->on('locations')->restrictOnDelete()->cascadeOnUpdate();
            $table->string('to_location');
            $table->foreign('to_location')->references('location')->on('locations')->restrictOnDelete()->cascadeOnUpdate();
            $table->string('seat_quality');
            $table->foreign('seat_quality')->references('quality')->on('seat_qualities')->restrictOnDelete()->cascadeOnUpdate();
            $table->string('seat_quantity');
            $table->smallInteger('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bus_details');
    }
};
