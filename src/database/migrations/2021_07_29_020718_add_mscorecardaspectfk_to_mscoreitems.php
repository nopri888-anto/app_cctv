<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMscorecardaspectfkToMscoreitems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mscorecarditems', function (Blueprint $table) {
            $table->bigInteger('mscorecardaspectfk')->unsigned();
            $table->foreign('mscorecardaspectfk')->references('id')->on('mscorecardaspect')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mscorecarditems', function (Blueprint $table) {
            $table->bigInteger('mscorecardaspectfk')->unsigned();
            //$table->foreign('mscorecardaspectfk')->references('id')->on('mscorecardaspect')->onDelete('cascade');
        });
    }
}
