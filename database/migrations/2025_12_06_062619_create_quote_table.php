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
        Schema::create('quote', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('address')->nullable();
            $table->string('other_address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('email')->nullable();
            $table->string('h_phone')->nullable();
            $table->string('phone')->nullable();
            $table->string('contact_method')->nullable();
            $table->string('e_date')->nullable();
            $table->string('e_location')->nullable();
            $table->string('about_us')->nullable();
            $table->string('e_planning')->nullable();
            $table->string('persons', 100)->nullable();
            $table->string('message')->nullable();
            $table->string('d_date')->nullable();
            $table->string('d_time')->nullable();
            $table->string('pickup')->nullable();
            $table->string('p_time')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->integer('is_active')->default(1);
            $table->tinyInteger('is_read')->nullable()->default(0);
            $table->tinyInteger('is_deleted')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quote');
    }
};
