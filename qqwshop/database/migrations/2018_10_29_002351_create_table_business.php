<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBusiness extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business', function (Blueprint $table) {
            $table->increments('id');
            $table->string('login_name',255)->comment('登录名');
            $table->string('login_pwd',255)->comment('登录密码');
            $table->string('shop_name',255)->comment('店铺名称');
            $table->string('company_name',255)->comment('公司名称');
            $table->string('company_phone',255)->comment('公司电话');
            $table->string('company_address',255)->comment('公司详细地址');
            $table->string('contacts_name',255)->comment('联系人姓名');
            $table->string('contacts_qq',255)->comment('联系人QQ');
            $table->string('contacts_phone',255)->comment('联系人电话');
            $table->string('contacts_email',255)->comment('联系人邮箱');
            $table->tinyInteger('status')->default(0)->comment('商家状态');
            $table->string('b_l_n',255)->comment('营销执照号');
            $table->string('t_r_c',255)->comment('税务登记证号');
            $table->string('o_c_c',255)->comment('组织机构代码证');
            $table->string('l_r',255)->comment('法定代表人');
            $table->string('l_r_id',255)->comment('法定代表人身份证');
            $table->string('n_o_a_b',255)->comment('开户行名称');
            $table->string('bank_branch',255)->comment('开户行支付');
            $table->string('bank_account',255)->comment('银行账号');
            $table->index('login_name');
            $table->index('login_pwd');
            
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
        Schema::dropIfExists('business');
    }
}
