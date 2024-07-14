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
        Schema::create('customers', function (Blueprint $table) { // clients of the various entities on kavawa
            $table->id();
            $table->foreignId('entity_id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->foreignId('country_id')->nullable()->constrained()->cascadeOnDelete();
            $table->boolean('is_business')->default(false);
            $table->string('business_name')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_address')->nullable();
            $table->string('website')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
