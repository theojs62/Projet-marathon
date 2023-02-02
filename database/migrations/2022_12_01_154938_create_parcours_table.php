<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcours', function (Blueprint $table) {
            $table->unsignedBigInteger('salle_courante_id');
            $table->unsignedBigInteger('salle_suivante_id');
            $table->foreign('salle_courante_id')->references('id')->on('salles')->onDelete('cascade');
            $table->foreign('salle_suivante_id')->references('id')->on('salles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parcours');
    }
};
