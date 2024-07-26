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

            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();

            $table->string('np_first_name')->nullable(); // Nepali first name
            $table->string('np_middle_name')->nullable(); // Nepali middle name
            $table->string('np_last_name')->nullable(); // Nepali last name
            
            $table->date('dob_ad')->nullable(); // AD date of birth
            $table->string('dob_bs')->nullable(); // BS date of birth (Nepali calendar)

            $table->string('citizenship_number')->nullable();
            $table->string('issued_date')->nullable(); // Nepali date format
            $table->date('issued_date_ad')->nullable(); // AD date format
             $table->unsignedBigInteger('issued_district_id')->nullable();
             $table->string('issued_district_name')->nullable();

            $table->unsignedBigInteger('province_id')->nullable();
            $table->string('province')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->string('district')->nullable();
            $table->unsignedBigInteger('muncipality_id')->nullable();
            $table->string('municipality')->nullable();
            $table->unsignedBigInteger('ward_id')->nullable();
            $table->string('ward')->nullable();
            $table->string('tole')->nullable();

            $table->string('f_name')->nullable(); // Father's name
            $table->string('m_name')->nullable(); // Mother's name
            $table->string('g_name')->nullable(); // Grandfather's name

            $table->string('citizenship_front')->nullable(); // Citizenship front image file name
            $table->string('citizenship_front_url')->nullable(); // Citizenship front image URL
            $table->string('citizenship_back')->nullable(); // Citizenship back image file name
            $table->string('citizenship_back_url')->nullable(); // Citizenship back image URL
            $table->string('social_security_fund_number')->nullable(); 
            
            $table->enum('gender', ['Male', 'Female', 'Other'])->nullable();
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
