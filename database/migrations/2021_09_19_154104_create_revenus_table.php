<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revenus', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->string('nom');
            $table->text('description')->nullable();
            $table->double('montant');
            $table->integer('date_appro');
            $table->integer('id_source');
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
        Schema::dropIfExists('revenus');
    }
}
