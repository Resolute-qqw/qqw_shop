<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_carts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('goods_id');
            $table->string('goods_name',255)->comment("商品名称");
            $table->string('goods_sku',255)->comment("商品规格");
            $table->float('goods_price',10,2)->comment('价格');
            $table->tinyInteger('goods_status')->default(0)->comment('购物车商品状态');
            $table->unsignedInteger('goods_count')->comment("商品数量");
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
        Schema::dropIfExists('goods_carts');
    }
}
