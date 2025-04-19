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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('customerID');
            // $table->foreignId('customerID')->constrained('customers')->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->string('image')->nullable();
            $table->integer('calories')->nullable();
            $table->integer('servings')->nullable();
            $table->string('prep_time')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // $table->string('categories')->nullable(); 
            $table->timestamps();
            // $table->string('categories')->nullable()->after('image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipe_tag');
        Schema::dropIfExists('category_recipe'); 
        Schema::dropIfExists('likes');  // Drop the likes table
        Schema::dropIfExists('comments'); 
        Schema::dropIfExists('recipes');
    }
};
