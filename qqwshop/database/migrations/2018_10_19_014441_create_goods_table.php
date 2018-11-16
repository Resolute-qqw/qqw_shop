<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('goods_name', 255)->comment('商品名称');
            $table->string('goods_sm_logo', 255)->comment('商品小logo');
            $table->string('goods_md_logo', 255)->comment('商品中logo');
            $table->string('goods_bg_logo', 255)->comment('商品大logo');
            $table->tinyInteger('whether_sale')->default(0)->comment('是否上架');
            $table->tinyInteger('is_sku')->default(0)->comment('是否选择了SKU');
            $table->longText('description')->comment('商品描述');
            $table->unsignedInteger('goods_type_id')->comment('商品id');
            $table->unsignedInteger('goods_type_id2');
            $table->unsignedInteger('goods_type_id3');
            $table->unsignedInteger('brand_id')->comment('品牌id');

            $table->timestamps();
            $table->index('id');
            $table->engine = 'InnoDB';
            $table->comment='商品表';
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
