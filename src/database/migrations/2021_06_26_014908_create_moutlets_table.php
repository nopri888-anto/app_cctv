<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoutletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moutlets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('mbranchfk')->unsigned();
            $table->string('outlatename', 70);
            $table->string('updated', 10);
            $table->timestamps();
            $table->foreign('mbranchfk')->references('id')->on('mbranches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('moutlets');
    }
}