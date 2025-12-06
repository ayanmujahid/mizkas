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
        Schema::create('imagetable', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('table_name')->nullable();
            $table->text('img_path')->nullable();
            $table->text('footer_logo')->nullable();
            $table->string('color_code')->nullable();
            $table->text('headings')->nullable();
            $table->string('subHeading')->nullable();
            $table->string('subHeading_2')->nullable();
            $table->text('long_desc')->nullable();
            $table->text('btn_text')->nullable();
            $table->text('btn_link')->nullable();
            $table->text('video_link')->nullable();
            $table->timestamp('created_at')->useCurrentOnUpdate()->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
            $table->integer('type')->nullable()->default(1);
            $table->string('is_active_img', 1)->nullable()->default('1');
            $table->text('additional_attributes')->nullable();
            $table->text('img_href')->nullable();
            $table->string('img_width')->nullable();
            $table->string('img_height')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imagetable');
    }
};
