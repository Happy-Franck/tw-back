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
            $table->bigIncrements('id');
            $table->string('nom_entreprise')->nullable();
            $table->string('adresse_siege_social')->nullable();
            $table->string('gerant')->nullable();
            $table->string('debut_d_activite')->nullable();
            $table->Integer('telephone')->nullable();
            $table->Integer('numero_rcs')->nullable();
            $table->string('mail_de_contact')->nullable();
            $table->string('logo')->nullable();
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
