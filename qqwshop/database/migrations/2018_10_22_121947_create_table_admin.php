<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAdmins extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username',255);
            $table->string('password',255);
            $table->string('position',255);
            $table->tinyInteger('status');
            $table->string('remarks',255);
            $table->timestamps();
            $table->index('id');
            $table->engine='InnoDB';
            $table->comment='管理员表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
