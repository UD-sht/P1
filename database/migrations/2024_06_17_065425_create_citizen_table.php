<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitizenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citizen', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('customer')->onDelete('cascade');
            $table->integer('hhid')->nullable();
            $table->string('citizenship_no')->nullable();
            $table->date('citizenship_issue_date')->nullable();
            $table->string('f_name', 60)->nullable();
            $table->string('m_name', 60)->nullable();
            $table->string('l_name', 60)->nullable();
            $table->string('full_name')->nullable();
            $table->string('t_province')->nullable();
            $table->string('t_district')->nullable();
            $table->string('t_municipality')->nullable();
            $table->string('t_ward_no')->nullable();
            $table->string('t_tole')->nullable();
            $table->string('f_fname', 60)->nullable();
            $table->string('m_fname', 60)->nullable();
            $table->string('l_fname', 60)->nullable();
            $table->string('f_mname', 60)->nullable();
            $table->string('m_mname', 60)->nullable();
            $table->string('l_mname', 60)->nullable();
            $table->string('f_gname', 60)->nullable();
            $table->string('m_gname', 60)->nullable();
            $table->string('l_gname', 60)->nullable();
            $table->string('contact_no')->nullable();
            $table->string('email')->nullable();
            $table->enum('gender', ['male', 'female', 'other']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citizen');
    }
}
