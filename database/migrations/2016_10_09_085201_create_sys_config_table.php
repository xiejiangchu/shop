<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysConfigTable extends Migration
{
    /**
     *
     * php artisan make:migration create_sys_config_table --create=sys_config
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_config', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 20);
            $table->string('value');
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
        Schema::dropIfExists('sys_config');
    }
}
