<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMbranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mbranches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('mregionfk')->unsigned();
            $table->string('branchid', 10);
            $table->string('branchname', 70);
            $table->string('branchaddress', 100);
            $table->string('branchcity', 70);
            $table->string('updatedby', 15);
            $table->timestamps();
            $table->foreign('mregionfk')->references('id')->on('mregions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mbranches');
    }
}