<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('email', 255)->unique();
            $table->string('societe', 255);
            $table->string('rc', 50);
            $table->string('tel', 50);
            $table->string('gender', 1);
            $table->string('password', 60);
            $table->char('statut', 1)->default('1');
            $table->string('rue', 255);
            $table->string('ville', 255);
            $table->string('pays', 255);
            $table->string('a_propos', 1000);
            $table->string('logo', 255);
            $table->rememberToken();
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
