<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->string('NO');
            $table->integer('uid')->unsigned();
            $table->tinyInteger('orderStatus');
            $table->tinyInteger('payStatus');
            $table->tinyInteger('shipStatus');
            $table->decimal('goodsAmount', 10, 3);
            $table->decimal('goodsWeight', 10, 3);
            $table->decimal('goodsMoney', 10, 2);
            $table->integer('bonusId');
            $table->string('bonusMoney');
            $table->date('sendTime');
            $table->integer('addressId')->unsigned();
            $table->string('city');
            $table->string('district', 50);
            $table->string('address', 100);
            $table->string('mobile', 20);
            $table->string('nameContact', 20);
            $table->string('message');
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
        Schema::dropIfExists('order');
    }
}
