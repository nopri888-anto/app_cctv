<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMcamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mcams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('moutletfk')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('camid', 20);
            $table->ipAddress('camip', 30);
            $table->string('camport', 4);
            $table->string('camusername', 50);
            $table->string('campassword', 50);
            $table->string('camrtsp', 100);
            $table->string('camdeviceport', 4);
            $table->timestamps();

            $table->foreign('moutletfk')->references('id')->on('moutlets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mcams');
    }
}