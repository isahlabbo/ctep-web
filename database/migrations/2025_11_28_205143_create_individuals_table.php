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
        Schema::create('individuals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id');
            $table->foreignId('lga_id');
            $table->string('status')->default('pending');
            $table->string('purpose'); 
            $table->string('address'); 
            $table->string('code');
            $table->string('mode'); 
            $table->string('capacity'); 
            $table->string('office_space');
            $table->string('LAN_availability'); 
            $table->string('contact_email'); 
            $table->string('contact_phone'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('individuals');
    }
};
