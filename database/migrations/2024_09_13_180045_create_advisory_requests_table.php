<?php

use App\Enums\RequestStatuses;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('advisory_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('time');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->foreignId('advisory_subject_id')->constrained('advisory_subjects');
            $table->tinyInteger('status')->default(RequestStatuses::REQUESTED);
            $table->foreignId('user_id')->constrained('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advisory_requests');
    }
};
