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
        Schema::create('exam_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        $types = ['JAMB', 'WAEC', 'NECO', 'NABTEB', 'GCE', 'ASSESSMENT','RECRUITMENT TEST', 'OTHER'];
        foreach ($types as $type) {
            \App\Models\ExamType::create(['name' => $type]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_types');
    }
};
