<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaiementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paiements', function (Blueprint $table) {
            $table->id();
            $table->string('paiement_number')->unique();
            $table->string('p_name')->nullable();
            $table->string('p_prenom')->nullable();
            $table->string('p_email')->nullable();
            $table->string('p_phone')->nullable();
            $table->string('p_ville')->nullable();
            $table->string('p_zip')->nullable();
            $table->integer('p_mnt')->nullable();
            $table->longText('p_com')->nullable();
            $table->boolean('p_status')->default(0);
            $table->string('p_DatePaiement')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('paiements');
    }
}
