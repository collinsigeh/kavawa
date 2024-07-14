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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('subject'); // descriptive summary of the complain
            $table->string('token'); // unique identifier that will be used to view (without logging in) this ticket and it's adjoining thread of messages.
            $table->foreignId('entity_id'); // The entity this ticket was submitted to.
            $table->foreignId('manager_id'); // The person who's been selected or opted to take care of this ticket.
            $table->boolean('is_open')->default(true); // whether conversation is still opened for this ticket
            $table->foreignId('customer_id'); // the person who created the support ticket
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
