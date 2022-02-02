<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMmenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mmenu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('menuorderno');
            $table->string('menugroup', 20);
            $table->string('menusubgroup', 20);
            $table->string('menuname', 40);
            $table->string('menupath', 40);
            $table->string('menuparamname', 10);
            $table->string('menuparamvalue', 20);
            $table->string('menugroupicon', 9);
            $table->string('menusubgroupicon', 10);
            $table->string('menuicon', 11);
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
        Schema::dropIfExists('mmenu');
    }
}