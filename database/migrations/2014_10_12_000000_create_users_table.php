<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id(); // Laravel 6 use $table->bigIncrements('id');
            $table->foreignId('role_id'); // indicamos que o campo receberá uma chave estrangeira, sendo assim será criado com os mesmos atributos do campo id da tabela roles
            //$table->unsignedBigInteger('role_id'); -> comando alternativo para criar o campo para chave estrangeira
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
