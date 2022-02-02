<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTauditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taudits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('muserfk');
            $table->foreignId('moutletfk');
            $table->foreignId('mscorecardfk');
            $table->timestamp('audittime');
            $table->integer('auditscore');
            $table->string('yudisium');
            $table->timestamps();

            $table->foreign('muserfk')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('mscorecardfk')->references('id')->on('mscorecards')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taudits');
    }
}