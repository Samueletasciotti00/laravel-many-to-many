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
        Schema::table('projects', function (Blueprint $table) {

            // Istanzio una variabile per la migration, creando una colonna per la ForeKey;
            $table->unsignedBigInteger('category_id')->nullable()->after('id'); // ->after('id) ci sposta la colonna dopo la colonna di ID;

            // Creo la ForenKey;
            $table->foreign('category_id') //questo metodo crea la relazione sulla colonna indicata;
                ->references('id') // Si riferisce alla colonna di ID;
                ->on('categories') // Della tabella indicata;

                // Se elimino un elemento('project') data la questione del required il sistema ci darà errore;
                // Con questo comando dico al DB di settare in NULL la cella dell'elemento eliminato per evitare errori;
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {

            // Elimino la ForenKey;
            $table->dropForeign(['category_id']);

            // Elimino la colonna;
            $table->dropColumn(['category_id']);
        });
    }
};
