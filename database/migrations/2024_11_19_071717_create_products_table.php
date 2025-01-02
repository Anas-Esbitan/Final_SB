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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); 
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->decimal('price')->nullable();
            $table->string('image')->nullable(); 
            $table->enum('status', ['available', 'sold', 'swapped'])->default('available'); 
            $table->timestamps();
             $table->boolean('is_sponsored')->default(0);
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};