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
        Schema::create('venue_locations', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('venue_id')->nullable();
            $table->text('location')->nullable();
            $table->text('map_location')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venue_locations');
    }
};
