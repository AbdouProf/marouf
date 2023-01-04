<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRate2ToOffreReview extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('offre_reviews', function (Blueprint $table) {
            $table->tinyInteger('rate2')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('offre_reviews', function (Blueprint $table) {
            $table->dropColumn('rate2');

        });
    }
}
