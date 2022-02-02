<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaudityscoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taudityscore', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('taudityaspectfk')->unsigned();
            $table->string('item', 200);
            $table->integer('score');
            $table->timestamps();

            $table->foreign('taudityaspectfk')->references('id')->on('taudityaspect')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taudityscore');
    }
}