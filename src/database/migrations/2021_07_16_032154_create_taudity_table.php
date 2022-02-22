<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaudityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taudity', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('tadutfk')->unsigned();
            $table->foreignId('mcamfk')->unsigned();
            $table->string('audityname', 40);
            $table->integer('audityscore');
            $table->string('yudisium', 40);
            $table->timestamp('begintime');
            $table->timestamp('finishtime');
            $table->timestamps();

            $table->foreign('tadutfk')->references('id')->on('taudits')->onDelete('cascade');
            $table->foreign('mcamfk')->references('id')->on('mcams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taudity');
    }
}