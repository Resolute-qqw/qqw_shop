<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cate_name',255);
            $table->unsignedInteger('parent_id');
            $table->string('path',255);
            $table->index('id');
            $table->engine='InnoDB';
            $table->comment='商品路径表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods_categories');
    }
}
