<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMscorecardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mscorecards', function (Blueprint $table) {
            $table->id();
            $table->string('scorecarname', 40)->default();
            $table->string('status', 2)->default();
            $table->string('description', 200)->default();
            $table->string('updatedby', 15)->default();
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
        Schema::dropIfExists('mscorecards');
    }
}
