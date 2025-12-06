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
        Schema::create('blogs', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('title')->nullable();
            $table->string('topic')->nullable();
            $table->string('slug')->nullable();
            $table->string('short_desc')->nullable();
            $table->text('long_desc')->nullable();
            $table->text('img_path')->nullable();
            $table->text('category_id')->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->string('is_featured')->nullable()->default('0');
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable()->useCurrent();
            $table->tinyInteger('is_active')->default(1);
            $table->tinyInteger('is_deleted')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
