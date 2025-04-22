<?php

// database/migrations/xxxx_xx_xx_create_events_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organizer_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('set null')->nullable();
            $table->foreignId('venue_id')->constrained()->onDelete('set null')->nullable();

            $table->string('title');
            $table->text('description')->nullable();
            $table->datetime('start_time');
            $table->datetime('end_time');
            $table->decimal('price', 10, 2)->default(0.00);
            $table->integer('max_attendees')->nullable();
            $table->enum('status', ['draft', 'published', 'cancelled'])->default('draft');

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('events');
    }
};
