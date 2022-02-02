<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusergroupmenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('musergroupmenu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('musergroupfk')->unsigned();
            $table->bigInteger('mmenufk')->unsigned();
            $table->timestamps();

            $table->foreign('musergroupfk')->references('id')->on('musergroups')->onDelete('cascade');
            $table->foreign('mmenufk')->references('id')->on('mmenu')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('musergroupmenu');
    }
}