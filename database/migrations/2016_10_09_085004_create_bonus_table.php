<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->string('name');
            $table->string('desc');
            $table->integer('category_id1')->nullable();
            $table->integer('category_id2')->nullable();
            $table->integer('goods_id')->nullable();
            $table->decimal('min_amount', 10, 2)->defalut(0);
            $table->boolean('is_enable')->default(1);
            $table->dateTime('begin');
            $table->dateTime('end');
            $table->dateTime('available_start');
            $table->dateTime('available_end');
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
        Schema::dropIfExists('bonus');
    }
}
