<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('demande_number')->unique();
            $table->unsignedBigInteger('cat_id')->nullable();
            $table->enum('Dstatus',['en cours','Terminer'])->default('en cours');
            $table->string('Dadress')->nullable();
            $table->string('Dpays')->nullable();
            $table->string('Dville')->nullable();
            $table->integer('Bmin')->nullable();
            $table->integer('Bmax')->nullable();
            $table->integer('NombreDa')->nullable();
            $table->string('Date')->nullable();
            $table->string('Dimage');
            $table->longText('Ddesc')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();

            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');


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
        Schema::dropIfExists('demandes');
    }

    
}
