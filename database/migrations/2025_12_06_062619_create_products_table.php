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
        Schema::create('products', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('user_id')->nullable();
            $table->integer('gallery_id')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->text('short_desc')->nullable();
            $table->text('long_desc')->nullable();
            $table->string('old_price')->nullable();
            $table->string('price')->nullable();
            $table->integer('rating')->nullable();
            $table->text('img_path')->nullable();
            $table->text('category_id')->nullable();
            $table->tinyInteger('sub_category_id')->nullable();
            $table->string('floor_price')->nullable();
            $table->string('square_foot')->nullable();
            $table->string('number_of_panels')->nullable();
            $table->string('number_of_dancers')->nullable();
            $table->string('installation_cost')->nullable();
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
        Schema::dropIfExists('products');
    }
};
