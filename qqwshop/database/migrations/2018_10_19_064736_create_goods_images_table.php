<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_images', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('image_id');
            $table->string('image_path',514);
            $table->index('image_path');
            $table->engine='InnoDB';
            $table->comment='商品图片表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods_images');
    }
}
