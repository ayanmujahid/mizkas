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
        Schema::create('course', function (Blueprint $table) {
            $table->integer('id');
            $table->string('title');
            $table->string('slug');
            $table->string('img_path', 800)->nullable();
            $table->text('short_desc');
            $table->integer('course_type')->nullable();
            $table->text('scorm_fIle')->nullable();
            $table->text('pdf_file')->nullable();
            $table->text('course_link')->nullable();
            $table->text('course_email')->nullable();
            $table->text('course_password')->nullable();
            $table->string('is_active')->default('1');
            $table->date('created_at');
            $table->date('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course');
    }
};
