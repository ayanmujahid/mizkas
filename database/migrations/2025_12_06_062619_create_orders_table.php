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
        Schema::create('orders', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('plan_id')->nullable();
            $table->integer('pkg_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->bigInteger('variation_id')->nullable();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('company')->nullable();
            $table->string('country')->nullable();
            $table->string('address')->nullable();
            $table->string('zip')->nullable();
            $table->text('note')->nullable();
            $table->string('pay_type')->nullable();
            $table->string('total_amount')->nullable();
            $table->string('order_amount')->nullable();
            $table->text('order_response')->nullable();
            $table->integer('user_id')->nullable();
            $table->tinyInteger('pay_status')->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
            $table->tinyInteger('is_active')->default(0);
            $table->tinyInteger('is_deleted')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
