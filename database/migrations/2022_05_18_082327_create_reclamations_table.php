<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReclamationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reclamations', function (Blueprint $table) {
            $table->id();
            $table->string('rec_number')->unique();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('demande_id')->nullable();
            $table->unsignedBigInteger('offre_id')->nullable();
            $table->text('rdesc')->nullable();
            $table->enum('rstatus',['en cours','Terminer'])->default('en cours');
            $table->enum('AdminDec',['cloturer','refund demandeur', 'refund soumissionnaire'])->nullable();


            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');
            $table->foreign('demande_id')->references('id')->on('demandes')->onDelete('SET NULL');
            $table->foreign('offre_id')->references('id')->on('offres')->onDelete('SET NULL');



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
        Schema::dropIfExists('reclamations');
    }
}
