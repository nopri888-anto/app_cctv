<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaudityaspectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taudityaspect', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('taudityfk')->unsigned();
            $table->bigInteger('maspectfk')->unsigned();
            $table->timestamp('begintime');
            $table->timestamp('finishtime');
            $table->integer('aspectscore');
            $table->string('yudisium');
            $table->timestamps();

            $table->foreign('taudityfk')->references('id')->on('taudity')->onDelete('cascade');
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
        Schema::dropIfExists('taudityaspect');
    }
}