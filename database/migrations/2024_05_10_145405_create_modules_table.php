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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string('nom',100);
            $table->integer('nbrHeures',);
            $table->unsignedBigInteger('prof_id');
            $table->foreign('prof_id')->references('id')->on('profs')->onDelete('cascade');
            $table->unsignedBigInteger('annee_section_id');
            $table->foreign('annee_section_id')->references('id')->on('annee_sections')->onDelete('cascade');
            $table->unsignedBigInteger('day_id')->nullable();
            $table->foreign('day_id')->references('id')->on('days')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
