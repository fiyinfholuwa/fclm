<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('outreach_programmes', function (Blueprint $table) {
            $table->id(); $table->string('title'); $table->text('description'); $table->string('icon')->default('fa-hands-helping');
            $table->enum('colour', ['yellow', 'green', 'blue', 'red', 'purple'])->default('green'); $table->unsignedInteger('display_order')->default(1);
            $table->enum('status', ['active', 'inactive'])->default('active'); $table->timestamps();
        });
        $now = now();
        DB::table('outreach_programmes')->insert([
            ['title'=>'Inner City Mission','description'=>'Reaching urban communities','icon'=>'fa-city','colour'=>'yellow','display_order'=>1,'status'=>'active','created_at'=>$now,'updated_at'=>$now],
            ['title'=>'Rural Evangelism','description'=>'Taking the gospel to villages','icon'=>'fa-mountain','colour'=>'green','display_order'=>2,'status'=>'active','created_at'=>$now,'updated_at'=>$now],
            ['title'=>'Media Outreach','description'=>'Digital evangelism','icon'=>'fa-broadcast-tower','colour'=>'blue','display_order'=>3,'status'=>'active','created_at'=>$now,'updated_at'=>$now],
        ]);
    }
    public function down(): void { Schema::dropIfExists('outreach_programmes'); }
};
