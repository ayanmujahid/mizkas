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
        Schema::create('invoices', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('invoice_id')->nullable();
            $table->string('full_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->date('date')->nullable();
            $table->string('vin')->nullable();
            $table->year('year')->nullable();
            $table->string('model')->nullable();
            $table->string('mileage')->nullable();
            $table->string('color')->nullable();
            $table->integer('unit')->nullable();
            $table->text('product_details')->nullable();
            $table->integer('amount_paid')->nullable();
            $table->integer('amount_due')->nullable();
            $table->integer('1_month')->nullable();
            $table->integer('2_month')->nullable();
            $table->integer('3_month')->nullable();
            $table->integer('4_month')->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->tinyInteger('is_deleted')->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
