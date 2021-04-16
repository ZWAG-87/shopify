<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeDesignationColumnUniqueOnProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produits', function (Blueprint $table) {
            //
            $table->string("designation")->unique()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()  //la methode down fait l'action contraire de la methode up lors d'une migration
    {
        Schema::table('produits', function (Blueprint $table) {
            //
            $table->dropUnique("produits_designation_unique"); //produits_designation_unique est le nom par défaut donné à l'index
        });
    }
}
