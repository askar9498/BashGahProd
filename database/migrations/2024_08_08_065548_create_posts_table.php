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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->tinyInteger('type')->default(1);
            $table->string('slug')->unique()->nullable();
            $table->text('description');
            $table->longText('body');
            $table->tinyInteger('status')->default(1);
            $table->longText('user_id');
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('featured_image_id')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('tags')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
