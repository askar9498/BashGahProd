<?php

use App\Enums\SupplementaryInsurancePaymentType;
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
        Schema::create('supplementary_insurance_payments', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('type')->default(SupplementaryInsurancePaymentType::PARACLINICAL);
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('dependent_id')->constrained('dependents');
            $table->double('amount');
            $table->string('medical_center');
            $table->dateTime('illness_date')->nullable();
            $table->dateTime('remittance_date')->nullable();
            $table->dateTime('register_date')->nullable();
            $table->dateTime('validity_date')->nullable();
            $table->foreignId('illness_id')->constrained('illnesses');
            $table->foreignId('illness_type_id')->constrained('illness_types');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplementary_insurance_payments');
    }
};
