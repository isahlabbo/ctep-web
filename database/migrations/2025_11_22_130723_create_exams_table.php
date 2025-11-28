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
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exam_type_id');
            $table->foreignId('centre_id')->nullable();
            $table->foreignId('school_id')->nullable();
            $table->foreignId('cafe_id')->nullable();
            $table->foreignId('organization_id')->nullable();
            $table->string('app_code');
            $table->string('start_at');
            $table->string('end_at');
            $table->string('capacity');
            $table->string('title');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
