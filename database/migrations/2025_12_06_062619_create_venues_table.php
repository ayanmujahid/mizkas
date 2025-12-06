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
        Schema::create('venues', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('user_id');
            $table->integer('category_id')->nullable();
            $table->string('slug')->nullable();
            $table->text('img_path')->nullable();
            $table->string('title')->nullable();
            $table->time('time_start')->nullable();
            $table->time('time_end')->nullable();
            $table->text('fb')->nullable();
            $table->text('insta')->nullable();
            $table->text('twitter')->nullable();
            $table->text('pinterest')->nullable();
            $table->text('spotify')->nullable();
            $table->text('description')->nullable();
            $table->text('map_location')->nullable();
            $table->text('location')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->date('event_date')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->text('soundcloud')->nullable();
            $table->text('youtube')->nullable();
            $table->text('tiktok')->nullable();
            $table->text('parking_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venues');
    }
};
