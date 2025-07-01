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
        Schema::table('life_insurance_obligations', function (Blueprint $table) {
            $table->string('insurance_no')->nullable();
            $table->string('insurance_company')->nullable();
            $table->string('insurance_year')->nullable();
            $table->double('insurance_premium')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('life_insurance_obligations', function (Blueprint $table) {
            $table->dropColumn('insurance_no');
            $table->dropColumn('insurance_company');
            $table->dropColumn('insurance_year');
            $table->dropColumn('insurance_premium');
        });
    }
};
