<?php

use App\Enums\RequestStatuses;
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
        Schema::create('psychological_use_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('center_id')->constrained('psychological_centers');
            $table->foreignId('user_id')->constrained('users');
            $table->dateTime('date');
            $table->tinyInteger('status')->default(RequestStatuses::REQUESTED);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('psychological_use_requests');
    }
};
