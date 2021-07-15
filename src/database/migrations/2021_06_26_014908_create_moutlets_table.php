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
            $table->id();
            $table->foreignId('mbranchfk')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('outlatename', 70);
            $table->string('updated', 10);
            $table->timestamps();
            $table->foreign('mbranchfk')->references('id')->on('mbranches');
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
