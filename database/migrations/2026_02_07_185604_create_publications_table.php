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
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('category', ['tract', 'audio', 'devotional']);
            $table->string('author')->nullable();
            $table->text('description')->nullable();
            $table->string('file_path')->nullable(); // For uploaded PDFs
            $table->string('link')->nullable(); // For audio links or external URLs
            $table->string('thumbnail_path')->nullable(); // Optional thumbnail
            $table->date('publication_date')->nullable();
            $table->integer('download_count')->default(0);
            $table->boolean('featured')->default(false);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
            
            // Indexes for better performance
            $table->index('category');
            $table->index('status');
            $table->index('featured');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publications');
    }
};
