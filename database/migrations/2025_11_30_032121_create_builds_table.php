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
            $table->string('build_id')->nullable(); // random id for our record
            $table->string('workflow_run_id')->nullable(); // optional
            $table->string('status')->default('queued'); // queued, running, success, failed
            $table->text('log')->nullable();
            $table->json('artifacts')->nullable(); // array of artifact file names
            $table->string('sqlite_local_path')->nullable()->after('status');
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
