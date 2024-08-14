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
        Schema::create('record', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->nullable();
            $table->string('citizenship_no')->nullable();
            $table->date('citizenship_issue_date')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('record');
    }
};
