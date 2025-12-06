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
        Schema::create('m_flag', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('flag_type', 100);
            $table->string('flag_value', 250)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
            $table->text('flag_additionalText')->nullable();
            $table->string('has_image', 1)->nullable()->default('0');
            $table->string('is_active', 1)->nullable()->default('1');
            $table->string('is_config', 1)->nullable()->default('0');
            $table->text('flag_show_text')->nullable();
            $table->integer('is_featured')->nullable()->default(0);
            $table->integer('is_deleted')->nullable()->default(0);
            $table->integer('user_id')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_flag');
    }
};
