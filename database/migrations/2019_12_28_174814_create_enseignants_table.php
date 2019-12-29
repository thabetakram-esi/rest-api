<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnseignantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Enseignants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Nom');
            $table->string('Prenom');
            $table->string('NomUtilisateur');
            $table->string('MotDePasse');
            $table->string('ConfirmMotDePasse');
            $table->string('Module');
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
        Schema::dropIfExists('Enseignants');
    }
}
