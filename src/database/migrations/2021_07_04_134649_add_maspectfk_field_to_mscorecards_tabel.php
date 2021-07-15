<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMaspectfkFieldToMscorecardsTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mscorecards', function (Blueprint $table) {
            //
            $table->foreignId('maspectfk')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('maspectfk')->references('id')->on('maspeks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mscorecards', function (Blueprint $table) {
            //
            $table->dropColumn('maspectfk');
        });
    }
}
