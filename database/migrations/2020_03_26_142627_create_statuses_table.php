<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     * _______________________________________________________________
     * |   字段   |   类型   |  用途                                  |
     * |---------|----------|----------------------------------------|
     * | content |   text   | 储存微博的内容                          |
     * |---------|----------|----------------------------------------|
     * | user_id |  integer | 储存微博发布者的个人 id                  |
     * |         |          | index 为该字段加上索引，提高根据 user_id |
     * |         |          | 查找指定用户发布过的所有微博的查询效率    |
     * |---------|----------|----------------------------------------|
     * |create_ad|timestamps| 微博创建时间                            |
     * @return void
     */
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content');
            $table->integer('user_id')->index();
            $table->index(['created_at']);
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
        Schema::dropIfExists('statuses');
    }
}
