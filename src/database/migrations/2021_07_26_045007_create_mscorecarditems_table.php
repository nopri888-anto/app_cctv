<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMscorecarditemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mscorecarditems', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('item', 200);
            $table->timestamps();
            //$table->bigInteger('mscorecardaspectfk')->unsigned();

            // $table->foreign('mscorecardaspectfk')->references('id')->on('mscorecardaspect')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mscorecarditems');
    }
}
