<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMscorecardaspectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mscorecardaspect', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('mscorecardfk')->unsigned();
            $table->bigInteger('maspectfk')->unsigned();
            $table->timestamps();

            $table->foreign('mscorecardfk')->references('id')->on('mscorecards')->onDelete('cascade');
            $table->foreign('maspectfk')->references('id')->on('maspeks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mscorecardaspect');
    }
}