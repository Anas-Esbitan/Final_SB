<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    DB::statement("ALTER TABLE products MODIFY COLUMN status ENUM('New', 'used', 'Used in new condition') DEFAULT 'New'");
}

public function down()
{
    DB::statement("ALTER TABLE products MODIFY COLUMN status ENUM('available', 'sold', 'swapped') DEFAULT 'available'");
}
};