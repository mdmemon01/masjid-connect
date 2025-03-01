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
    Schema::create('prayer_times', function (Blueprint $table) {
        $table->id();
        $table->foreignId('masjid_id')->constrained()->onDelete('cascade');
        $table->date('date');
        $table->time('fajr');
        $table->time('dhuhr');
        $table->time('asr');
        $table->time('maghrib');
        $table->time('isha');
        $table->time('jummah')->nullable();
        $table->timestamps();
        
        // Ensure each masjid has only one set of prayer times per date
        $table->unique(['masjid_id', 'date']);
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prayer_times');
    }
};
