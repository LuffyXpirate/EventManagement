<?php
// database/migrations/xxxx_xx_xx_create_venues_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('venues', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('address');
            $table->string('city');
            $table->string('state');
            $table->string('postal_code');
            $table->string('country');
            $table->integer('capacity');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('venues');
    }
};
