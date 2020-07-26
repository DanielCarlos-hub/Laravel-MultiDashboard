<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
			$table->id(); // Comando para setar primary key no Laravel 7
			//$table->bigIncrements('id') Comando para primary key auto increment Laravel 6
            $table->string('role');
            $table->string('slug');
        });
		
		Schema::table('users', function (Blueprint $table) {
			$table->foreign('role_id')->references('id')->on('roles');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
