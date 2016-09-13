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
            $table->increments('id');
            $table->string('name');
            $table->string('mobile', 20)->unique();
            $table->string('email')->unique();
            $table->string('wx');
            $table->enum('role', array_keys(trans('globals.roles')))->default('person');
            $table->enum('status', array_keys(trans('globals.status')))->default('normal');
            $table->enum('verified', array_keys(trans('globals.verification')))->default('no');
            $table->string('description')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
