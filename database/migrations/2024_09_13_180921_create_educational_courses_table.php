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
        Schema::create('educational_courses', function (Blueprint $table) {
            $table->id();
            $table->integer('time');
            $table->dateTime('start');
            $table->dateTime('end')->nullable();
            $table->foreignId('educational_subject_id')->constrained('educational_subjects');
            $table->double('amount')->default(0);
            $table->foreignId('user_id')->constrained('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('educational_courses');
    }
};
