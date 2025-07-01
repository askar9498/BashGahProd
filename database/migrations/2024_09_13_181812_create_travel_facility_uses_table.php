<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('travel_facility_uses', function (Blueprint $table) {
            $table->id();
            $table->integer('count');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->foreignId('city_id')->constrained('cities');
            $table->foreignId('user_id')->constrained('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travel_facility_uses');
    }
};
