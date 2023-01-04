<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offres', function (Blueprint $table) {
            $table->id();
            $table->string('offre_number')->unique();
            $table->unsignedBigInteger('demande_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->integer('Mnt_offre')->nullable();
            $table->integer('Nbrj_offre')->nullable();
            $table->string('Date_offre')->nullable();
            $table->timestamps();

            $table->foreign('demande_id')->references('id')->on('demandes')->onDelete('SET NULL');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offres');
    }
}
