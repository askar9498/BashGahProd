<?php

use App\Enums\UserStatuses;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('employee_number')->nullable()->unique();
            $table->string('national_id')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->integer('retired_year')->nullable();
            $table->dateTime('brith_date')->nullable();
            $table->string('last_post')->nullable();
            $table->dateTime('club_membership_date')->nullable();
            $table->dateTime('club_validity_date')->nullable();
            $table->string('insurance_number')->nullable();
            $table->string('birth_certificate_number')->nullable();
            $table->string('cellphone')->nullable()->unique();
            $table->string('email')->nullable()->unique();
            $table->boolean('is_admin')->default(false);
            $table->string('password')->nullable();
            $table->foreignId('photo_id')->nullable();
            $table->foreignId('birth_certificate_image_id')->nullable();
            $table->foreignId('national_card_image_id')->nullable();
            $table->tinyInteger('status')->default(UserStatuses::ACTIVATED);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
