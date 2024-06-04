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
        Schema::create('absences', function (Blueprint $table) {
            $table->id();
            $table->text('motif')->nullable();
            $table->unsignedBigInteger('etudiant_id')->nullable();
            $table->foreign('etudiant_id')->references('id')->on('etudiants')->onDelete('cascade');
            $table->unsignedBigInteger('prof_id')->nullable();
            $table->foreign('prof_id')->references('id')->on('profs')->onDelete('cascade');
            
            
            $table->unsignedBigInteger('module_id');
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
            $table->timestamps();
        });
        
        //constraint for only one id to be there
        DB::statement('ALTER TABLE absences ADD CONSTRAINT absence_belongs_to_one_entity CHECK ((etudiant_id IS NOT NULL AND prof_id IS NULL) OR (etudiant_id IS NULL AND prof_id IS NOT NULL))');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absences');
    }
};
