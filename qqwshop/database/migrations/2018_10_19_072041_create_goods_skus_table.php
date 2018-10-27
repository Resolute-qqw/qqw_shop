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
            $table->string('attr_name',255);
            $table->unsignedInteger('Inventory');
            $table->float('price',10,2);
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
