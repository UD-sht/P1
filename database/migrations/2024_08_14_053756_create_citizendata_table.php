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
        Schema::create('citizendata', function (Blueprint $table) {
            $table->id();
            $table->integer('hhid')->nullable();
            $table->integer('hh_index')->nullable();

            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('full_name')->nullable();
            $table->string('full_name_en_block')->nullable();

            $table->date('dob_ad')->nullable();
            $table->string('dob_bs')->nullable();

            $table->string('citizenship_number')->nullable();
            $table->string('citizenship_issued_date')->nullable();
            $table->date('citizenship_issued_date_ad')->nullable();
             $table->unsignedBigInteger('citizenship_issued_district_id')->nullable();
             $table->string('citizenship_issued_district')->nullable();
             $table->string('no_citizenship_reason')->nullable();

            $table->unsignedBigInteger('province_id')->nullable();
            $table->string('province')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->string('district')->nullable();
            $table->unsignedBigInteger('municipality_id')->nullable();
            $table->string('municipality')->nullable();
            $table->unsignedBigInteger('ward')->nullable();
            $table->string('tole')->nullable();

            $table->string('citizenship_front')->nullable();
            $table->string('citizenship_front_url')->nullable();
            $table->string('citizenship_back')->nullable();
            $table->string('citizenship_back_url')->nullable();
            $table->string('blood_group')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('mobile_number', 15)->nullable();
            $table->string('email_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citizendata');
    }
};
