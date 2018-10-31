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
            $table->unsignedInteger('goods_id');
            $table->string('goods_sm_img')->comment('小尺寸缩略图');
            $table->string('goods_md_img')->comment('中尺寸缩略图');
            $table->string('goods_bg_img')->comment('大尺寸缩略图');
            $table->string('image_path',514)->comment('商品图');
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
