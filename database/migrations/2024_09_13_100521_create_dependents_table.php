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
        Schema::create('dependents', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('national_id');
            $table->tinyInteger('relationship')->default(1);
            $table->tinyInteger('gender')->default(1);
            $table->dateTime('birth_date');
            $table->string('father_name');
            $table->foreignId('supervisor_id')->constrained('users');
            $table->foreignId('birth_city_id')->constrained('cities');
            $table->string('insured_code')->nullable();
            $table->string('cellphone');
            $table->string('birth_certificate_number');
            $table->boolean('is_supplementary_insuranced')->default(false);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dependents');
    }
};
