<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid')->default(0);
            $table->string('name', 50);
            $table->tinyInteger('level')->default(1);
            $table->Integer('order')->nullable();
            $table->boolean('is_delete')->default(1);
            $table->boolean('is_recommend')->default(1);
            $table->string('pic_category')->nullable();
            $table->string('pic_path_big')->nullable();
            $table->string('pic_path_little')->nullable();
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
        Schema::dropIfExists('category');
    }
}
