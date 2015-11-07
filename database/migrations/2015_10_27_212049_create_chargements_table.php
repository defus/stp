<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChargementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chargements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('statut', 1);
            $table->integer('owner_id')->unsigned()->index();
            $table->nullableTimestamps();
            
            $table->foreign('owner_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('chargements');
    }
}
