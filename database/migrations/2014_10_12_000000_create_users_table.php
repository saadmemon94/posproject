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
            $table->bigIncrements('user_id');
            $table->string('user_name')->unique();
            $table->string('user_username')->unique();
            $table->string('password');
            $table->integer('user_loginstatus')->nullable();
            // $table->integer('warehouse_id')->nullable();
            // $table->integer('warehouse_id_2')->nullable();
            $table->integer('role_id')->nullable();
            $table->integer('status_id')->nullable();
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
