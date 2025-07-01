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
        Schema::table('supplementary_insurance_obligations', function (Blueprint $table) {
            $table->integer('franchise')->default(0)->after('amount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('supplementary_insurance_obligations', function (Blueprint $table) {
            $table->dropColumn('franchise');
        });
    }
};
