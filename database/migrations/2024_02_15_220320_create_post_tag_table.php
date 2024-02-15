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
        Schema::create('post_tag', function (Blueprint $table) {
            $table->id();
            
            // post_Id column connected to posts.id column 
            $table->foreignId('post_id')->constrained('posts')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
            
            // tag_Id column connected to tags.id column 
            $table->foreignId('tag_id')->constrained('tags')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
            
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_tag');
    }
};
