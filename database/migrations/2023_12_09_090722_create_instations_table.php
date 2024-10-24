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
        Schema::create('instations', function (Blueprint $table) {
            $table->id();

            $table->string('name')->unique();
            $table->string('link')->unique();
            $table->integer('icon_id')->nullable();
            $table->unsignedBigInteger('city_id')->default(0);
            $table->unsignedBigInteger('instation_type_id');
            $table->integer('sort')->default(500);
            $table->boolean('active')->default(true);

            $table->string('district')->nullable();
            $table->string('address')->nullable();
            $table->string('telephone')->nullable();
            $table->string('opening_hours')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instations');
    }
};
