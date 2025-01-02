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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->softDeletes(); // تأكد من إضافة softDeletes بشكل صحيح
            $table->string('First_name', 50)->nullable(); 
            $table->string('Last_name', 50)->nullable(); 
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->string('phone_number', 10)->nullable();
            $table->enum('role', ['user', 'admin'])->default('user');
            $table->text('address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // حذف الجدول بالكامل
        Schema::dropIfExists('users');
         $table->dropColumn('phone_number');
    }
};