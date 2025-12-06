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
        Schema::create('galleries', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('slug')->nullable();
            $table->integer('category_id')->nullable();
            $table->text('img_path')->nullable();
            $table->text('title')->nullable();
            $table->time('time_start')->nullable();
            $table->time('time_end')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
            $table->text('fb')->nullable();
            $table->text('insta')->nullable();
            $table->text('twitter')->nullable();
            $table->text('pinterest')->nullable();
            $table->text('description')->nullable();
            $table->text('map_location')->nullable();
            $table->string('location')->nullable();
            $table->date('event_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};
