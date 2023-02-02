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
        Schema::create('oeuvres', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 100);
            $table->string('media_url', 150);
            $table->string('thumbnail_url', 150);
            $table->text('description');
            $table->dateTime('date_creation');
            $table->string('style') ->default("class=\"monStyle, autreStyle\"");
            $table->unsignedInteger('coord_x')->default(0);
            $table->unsignedInteger('coord_y')->default(0);
            $table->boolean('valide') ->default(true);
            $table->string('auteur', 100);
            $table->unsignedBigInteger('salle_id');
            $table->foreign('salle_id')->references('id')->on('salles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oeuvres');
    }
};
