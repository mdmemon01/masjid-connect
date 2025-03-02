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
    Schema::create('announcements', function (Blueprint $table) {
        $table->id();
        $table->foreignId('masjid_id')->constrained()->onDelete('cascade');
        $table->string('title');
        $table->text('content');
        $table->string('image_path')->nullable(); // Add this line for image support
        $table->boolean('is_published')->default(true);
        $table->date('publish_date')->useCurrent();
        $table->date('expiry_date')->nullable();
        $table->string('category')->nullable(); // General, Event, Urgent, etc.
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('announcements');
    }
};
