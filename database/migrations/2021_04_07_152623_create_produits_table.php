<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id(); // l'id est créé automatiquement par laravel
            $table->unsignedBigInteger('category_id')->nullable(); //nomdumodel_id donc on a plus besoin de spécifier foreign_key
            $table->string("designation"); //->unique();
            $table->text("description");
            $table->integer("prix");
            $table->timestamps();  //date de création ou de modification du produits est également créé automatiquement
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produits');
    }
}
