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
        Schema::table('instations', function (Blueprint $table) {
            $table->string('coords')->after('active')->nullable();
            $table->text('props')->after('coords')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('instations', function (Blueprint $table) {
            $table->dropColumn('coords');
            $table->dropColumn('props');
        });
    }
};
