<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsSkusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_skus', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('goods_id');
            $table->string('sku_name',255)->comment('sku名');
            $table->string('sku_value',255)->comment('sku值');
            $table->unsignedInteger('Inventory')->comment('库存');
            $table->float('price',10,2)->comment('价钱');
            $table->index('goods_id');
            $table->engine='InnoDB';
            $table->comment='商品SKU表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods_skus');
    }
}
