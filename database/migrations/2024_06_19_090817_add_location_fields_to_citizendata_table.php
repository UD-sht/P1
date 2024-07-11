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
        Schema::table('citizendata', function (Blueprint $table) {
            $table->string('province')->nullable()->after('province_id');
            $table->string('district')->nullable()->after('district_id');
            $table->string('municipality')->nullable()->after('muncipality_id');
            $table->string('ward')->nullable()->after('ward_id');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('citizendata', function (Blueprint $table) {
            $table->dropColumn('province');
            $table->dropColumn('district');
            $table->dropColumn('municipality');
            $table->dropColumn('ward');
        });
    }
};
