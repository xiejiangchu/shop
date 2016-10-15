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
            $table->boolean('confirmed')->default(0);
            $table->tinyInteger('order_status')->default(0);
            $table->tinyInteger('pay_status')->default(0);
            $table->tinyInteger('ship_status')->default(0);
            $table->tinyInteger('package_status')->default(0);
            $table->decimal('order_amount', 10, 3)->default(0);
            $table->decimal('order_weight', 10, 3)->default(0);
            $table->decimal('order_money', 10, 2)->default(0);
            $table->decimal('order_amount_real', 10, 2)->default(0);
            $table->decimal('order_money_real', 10, 2)->default(0);
            $table->integer('bonus_id')->nullable();
            $table->string('bonus')->nullable();
            $table->string('point')->nullable();
            $table->string('payment', 20)->nullable();
            $table->date('send_date');
            $table->time('time_start');
            $table->time('time_end');
            $table->integer('address_id')->unsigned();
            $table->string('mobile', 20);
            $table->string('receiver', 20);
            $table->string('city', 20);
            $table->string('district', 50);
            $table->string('road', 50);
            $table->string('address', 100);
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
