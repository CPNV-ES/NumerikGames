<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * CreateProsesTable
 * 
 * @author Nicolas Henry
 */
class CreateProsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->boolean('is_full');
            $table->integer('theme_id')->unsigned()->nullable();
            $table->timestamps();

            // Foreing keys
            $table->foreign('theme_id')->references('id')->on('themes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proses', function (Blueprint $table) {
            $table->dropForeign(['theme_id']);
        });

        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('proses');
        Schema::enableForeignKeyConstraints();
    }
}
