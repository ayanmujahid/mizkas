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
        Schema::create('payment_logs', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('order_id')->nullable();
            $table->float('amount', 8)->nullable();
            $table->string('name_on_card')->nullable();
            $table->string('response_code')->nullable();
            $table->text('transaction_id')->nullable();
            $table->string('auth_id')->nullable();
            $table->string('message_code')->nullable();
            $table->integer('quantity')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_logs');
    }
};
