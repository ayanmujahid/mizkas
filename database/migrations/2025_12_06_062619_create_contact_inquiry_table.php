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
        Schema::create('contact_inquiry', function (Blueprint $table) {
            $table->tinyInteger('id', true);
            $table->string('company_name')->nullable();
            $table->string('company_slogan')->nullable();
            $table->text('company_type')->nullable();
            $table->string('prefrence')->nullable();
            $table->string('color')->nullable();
            $table->string('logo_type')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->integer('is_active')->nullable()->default(1);
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent();
            $table->integer('is_read')->nullable()->default(0);
            $table->integer('is_deleted')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_inquiry');
    }
};
