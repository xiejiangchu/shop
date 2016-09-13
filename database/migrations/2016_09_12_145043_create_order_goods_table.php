<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_goods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('orderId');
            $table->string('NO');
            $table->string('name');
            $table->integer('category');
            $table->decimal('marketPrice', 10, 2);
            $table->decimal('shopPrice', 10, 2);
            $table->decimal('promotePrice', 10, 2);
            $table->decimal('amount', 10, 2);
            $table->string('unit', 10, 2);
            $table->string('unitDesc')->default('');
            $table->decimal('unitStep', 10, 2)->default(1.00);
            $table->string('src');
            $table->string('thumb');
            $table->integer('quantity');
            $table->boolean('onSale')->default(1);
            $table->string('place')->nullable();
            $table->mediumText('slogan');
            $table->text('description')->nullable();
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
        Schema::dropIfExists('order_goods');
    }
}
