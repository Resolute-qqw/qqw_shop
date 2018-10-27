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
            $table->string('goods_name', 255);
            $table->string('goods_logo', 255);
            $table->enum('whether_sale', ['yes', 'no']);
            $table->longText('description');
            $table->unsignedInteger('goods_type_id');
            $table->unsignedInteger('brand_id');

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
