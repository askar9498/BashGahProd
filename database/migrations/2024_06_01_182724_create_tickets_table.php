<?php

use App\Enums\TicketPriorities;
use App\Enums\TicketStatuses;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->foreignId('referred_id')->nullable()->constrained('users');
            $table->foreignId('subject_id')->constrained('ticket_subjects');
            $table->foreignId('department_id')->constrained('ticket_departments');
            $table->string('title');
            $table->string('ticket_id')->nullable()->unique();
            $table->tinyInteger('status')->default(TicketStatuses::OPENED);
            $table->tinyInteger('priority')->default(TicketPriorities::NORMAL);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
