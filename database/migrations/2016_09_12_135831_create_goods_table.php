<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('id');
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
            $table->decimal('unit_sell', 10, 2)->default(1.00);
            $table->string('unitDesc')->nullable();
            $table->string('src')->nullable();
            $table->string('thumb')->nullable();
            $table->string('place')->nullable();
            $table->mediumText('summary')->nullable();
            $table->mediumText('notice')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('goods');
    }
}

/**


$table->bigIncrements('id');    自增ID，类型为bigint
$table->bigInteger('votes');    等同于数据库中的BIGINT类型
$table->binary('data'); 等同于数据库中的BLOB类型
$table->boolean('confirmed');   等同于数据库中的BOOLEAN类型
$table->char('name', 4);    等同于数据库中的CHAR类型
$table->date('created_at'); 等同于数据库中的DATE类型
$table->dateTime('created_at'); 等同于数据库中的DATETIME类型
$table->decimal('amount', 5, 2);    等同于数据库中的DECIMAL类型，带一个精度和范围
$table->double('column', 15, 8);    等同于数据库中的DOUBLE类型，带精度, 总共15位数字，小数点后8位.
$table->enum('choices', ['foo', 'bar']);    等同于数据库中的 ENUM类型
$table->float('amount');    等同于数据库中的 FLOAT 类型
$table->increments('id');   数据库主键自增ID
$table->integer('votes');   等同于数据库中的 INTEGER 类型
$table->json('options');    等同于数据库中的 JSON 类型
$table->jsonb('options');   等同于数据库中的 JSONB 类型
$table->longText('description');    等同于数据库中的 LONGTEXT 类型
$table->mediumInteger('numbers');   等同于数据库中的 MEDIUMINT类型
$table->mediumText('description');  等同于数据库中的 MEDIUMTEXT类型
$table->morphs('taggable'); 添加一个 INTEGER类型的 taggable_id 列和一个 STRING类型的 taggable_type列
$table->nullableTimestamps();   和 timestamps()一样但允许 NULL值.
$table->rememberToken();    添加一个 remember_token 列： VARCHAR(100) NULL.
$table->smallInteger('votes');  等同于数据库中的 SMALLINT 类型
$table->softDeletes();  新增一个 deleted_at 列 用于软删除.
$table->string('email');    等同于数据库中的 VARCHAR 列  .
$table->string('name', 100);    等同于数据库中的 VARCHAR，带一个长度
$table->text('description');    等同于数据库中的 TEXT 类型
$table->time('sunrise');    等同于数据库中的 TIME类型
$table->tinyInteger('numbers'); 等同于数据库中的 TINYINT 类型
$table->timestamp('added_on');  等同于数据库中的 TIMESTAMP 类型
$table->timestamps();   添加 created_at 和 updated_at列.
$table->uuid('id'); 等同于数据库的UUID


->first()   将该列置为表中第一个列 (仅适用于MySQL)
->after('column')   将该列置于另一个列之后 (仅适用于MySQL)
->nullable()    允许该列的值为NULL
->default($value)   指定列的默认值
->unsigned()    设置 integer 列为 UNSIGNED
 */
