<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSetSkuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sku_rule', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('goods_id');
            $table->string('sku_value')->comment("sku规格");
            $table->unsignedInteger('Inventory')->comment('库存');
            $table->float('price',10,2)->comment('价钱');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sku_rule');
    }
}
