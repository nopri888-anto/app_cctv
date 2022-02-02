<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMscoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mscores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('bottomscore');
            $table->integer('topscore');
            $table->string('yudisium', 40);
            $table->string('updatedby', 15);
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
        Schema::dropIfExists('mscores');
    }
}