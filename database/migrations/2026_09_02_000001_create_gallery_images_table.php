<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('gallery_images', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('image_path');
            $table->boolean('is_uploaded')->default(false);
            $table->unsignedInteger('display_order')->default(1);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
        $now = now();
        foreach (range(1, 23) as $number) {
            DB::table('gallery_images')->insert(['title' => "Ministry Gallery Image {$number}", 'image_path' => "gallery/g{$number}.png", 'display_order' => $number, 'status' => 'active', 'created_at' => $now, 'updated_at' => $now]);
        }
    }
    public function down(): void { Schema::dropIfExists('gallery_images'); }
};
