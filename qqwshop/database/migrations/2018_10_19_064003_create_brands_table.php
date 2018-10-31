<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_brands', function (Blueprint $table) {
            $table->increments('id');
            $table->string('brand_name',255)->comment('品牌名');
            $table->string('brand_logo',255)->comment('品牌logo');
            $table->string('brand_describe',255)->comment('品牌描述');
            $table->timestamps();
            $table->index('id');
            $table->engine='InnoDB';
            $table->comment='品牌表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brands');
    }
}
