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
        Schema::create('builds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exam_id');
            $table->string('build_id')->nullable(); 
            $table->string('workflow_run_id')->nullable(); 
            $table->string('status')->default('queued');
            $table->text('log')->nullable();
            $table->json('artifacts')->nullable();
            $table->string('sqlite_local_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('builds');
    }
};
