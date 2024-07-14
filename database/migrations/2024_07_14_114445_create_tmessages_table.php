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
        Schema::create('tmessages', function (Blueprint $table) { // actual support messages sent
            $table->id();
            $table->foreignId('ticket_id');
            $table->text('content');
            $table->boolean('manager_id')->nullable()->constrained()->cascadeOnDelete(); // the manager that wrote or was the first to view this message
            $table->boolean('is_seen_by_manager')->default(false); // will be marked as true if the message was posted by a manager
            $table->boolean('is_seen_by_customer')->default(false); // will be marked as true if the message was posted by a customer
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tmessages');
    }
};
