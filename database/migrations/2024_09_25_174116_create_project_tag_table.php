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
        Schema::create('project_tag', function (Blueprint $table) {

            //Creo una colonna per la relazione dei Progetti con i TAG
            $table->unsignedBigInteger('project_id');

            //Assegnare la ForenKey alla tabella
            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->cascadeOnDelete();

            //Creo una colonna per la relazione dei Progetti con i TAG
            $table->unsignedBigInteger('tag_id');

            //Assegnare la ForenKey alla tabella
            $table->foreign('tag_id')
                ->references('id')
                ->on('tags')
                ->cascadeOnDelete();

                 
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_tag');
    }
};
