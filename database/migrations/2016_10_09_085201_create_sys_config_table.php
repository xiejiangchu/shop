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
            $table->string('commany_name', 20);
            $table->string('commany_tel', 20);
            $table->string('commany_email', 20);
            $table->string('commany_phone', 20);
            $table->string('commany_address', 20);
            $table->string('commany_logo', 50);
            $table->string('commany_slogan', 30);
            $table->decimal('min_order', 10, 2);
            $table->decimal('deliver_fee', 10, 2);
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
