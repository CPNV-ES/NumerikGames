<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * CreateVersesTable
 * 
 * @author Nicolas Henry
 */
class CreateVersesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('content');
            $table->string('status')->default('1');
            $table->integer('prose_id')->unsigned()->nullable();
            $table->timestamps();

            // Foreing keys
            $table->foreign('prose_id')->references('id')->on('proses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('verses', function (Blueprint $table) {
            $table->dropForeign(['prose_id']);
        });

        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('verses');
        Schema::enableForeignKeyConstraints();
    }
}
