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
            $table->integer('oid');
            $table->string('no');
            $table->string('name');
            $table->integer('category_id1');
            $table->integer('category_id2');
            $table->boolean('is_remain')->default(1);
            $table->boolean('is_online')->default(1);
            $table->boolean('is_active')->default(1);
            $table->boolean('is_rough')->default(1); //加工
            $table->boolean('is_promote')->default(1);
            $table->boolean('is_delete')->default(0);
            $table->boolean('status')->default(1);
            $table->dateTime('promote_end')->nullable();
            $table->Integer('order')->nullable();
            $table->decimal('weight', 10, 2)->default(0);
            $table->decimal('order_quantity', 10, 2);
            $table->decimal('max_quantity', 10, 2);
            $table->decimal('market_price', 10, 2);
            $table->decimal('shop_price', 10, 2);
            $table->decimal('promote_price', 10, 2);
            $table->decimal('remain', 10, 2)->default(100);
            $table->decimal('sale_num', 10, 2)->default(0);
            $table->integer('quanlity');
            $table->string('unit');
            $table->string('unit_sell');
            // $table->decimal('unit_sell', 10, 2)->default(1.00);
            $table->string('unitDesc')->nullable();
            $table->string('src')->nullable();
            $table->string('thumb')->nullable();
            $table->string('place')->nullable();
            $table->mediumText('summary')->nullable();
            $table->mediumText('notice')->nullable();
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
