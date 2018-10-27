<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// 中间件
Route::middleware(['privilege'])->group(function(){

    // 主页
    Route::get('/','IndexController@index')->name('adminIndex');
    // 首页
    Route::get('/home','IndexController@home')->name('home');

    // 产品管理 #####
    // 产品类
    Route::get('/products/list','ProductsController@products_list')->name('productsList');
    // 添加产品
    Route::get('/products/add','ProductsController@add')->name('products.add');
    // 品牌管理
    Route::get('/brand/manage','ProductsController@brand_manage')->name('brandManage');
    // 分类管理
    Route::get('/category/manage','ProductsController@category_manage')->name('categoryManage');
    // 分类修改
    Route::get('/category/add','ProductsController@category_add')->name('categoryAdd');

    // 图片管理 #####
    // 广告管理
    Route::get('/advertising/manage','PictureController@advertising_manage')->name('advertisingManage');
    // 分类管理
    Route::get('/pictureCategory/manage','PictureController@pictureCategory_manage')->name('pictureCategoryManage');

    // 交易管理 #####
    // 交易信息
    Route::get('/transaction/info','transactionController@transaction_info')->name('transactionInfo');
    // 交易订单
    Route::get('/order/chart','transactionController@order_chart')->name('orderChart');
    // 订单管理
    Route::get('/order/manage','transactionController@order_manage')->name('orderManage');
    // 交易金额
    Route::get('/transaction/amounts','transactionController@transaction_amounts')->name('transactionAmounts');
    // 订单处理
    Route::get('/order/handling','transactionController@order_handling')->name('orderHandling');
    // 退款管理
    Route::get('/refund/manage','transactionController@refund_manage')->name('refundManage');

    // 支付管理 #####
    // 账户管理
    Route::get('/account/manage','PaymentController@account_manage')->name('accountManage');
    // 支付方式
    Route::get('/payment/method','PaymentController@payment_method')->name('paymentMethod');
    // 支付配置
    Route::get('/payment/configure','PaymentController@payment_configure')->name('paymentConfigure');
    // 账户信息
    Route::get('/account/Information','PaymentController@account_information')->name('accountInformation');

    // 会员管理 #####
    // 会员列表
    Route::get('/member/list','MemberController@member_list')->name('memberList');
    // 等级管理
    Route::get('/grade/manage','MemberController@grade_manage')->name('gradeManage');
    // 会员记录管理
    Route::get('/record/manage','MemberController@record_manage')->name('recordManage');

    // 店铺管理 #####
    // 店铺列表
    Route::get('/shop/list','ShopController@shop_list')->name('shopList');
    // 店铺审核
    Route::get('/shop/audit','ShopController@shop_audit')->name('shopAudit');

    // 消息管理 #####
    // 消息列表
    Route::get('/News/guestbook','NewsController@guestbook')->name('guestbook');
    // 意见反馈
    Route::get('/News/feedback','NewsController@feedback')->name('feedback');

    // 消息管理 #####
    // 消息列表
    Route::get('/article/list','ArticleController@article_list')->name('articleList');
    // 意见反馈
    Route::get('/article/sort','ArticleController@article_sort')->name('articleSort');

    // 系统管理 #####
    // 系统设置
    Route::get('/system/setup','SystemController@system_setup')->name('systemSetup');
    // 系统栏目管理
    Route::get('/system/section','SystemController@system_section')->name('systemSection');
    // 系统日志
    Route::get('/system/logs','SystemController@system_logs')->name('systemLogs');

    // 管理员管理 #####
    // 权限管理
    Route::get('/admin/privilege','AdminController@admin_privilege')->name('adminPrivilege');
    // 管理员列表
    Route::get('/admin/list','AdminController@admin_list')->name('adminList');
    // 个人信息
    Route::get('/admin/info','AdminController@info')->name('admin.info');
    // 退出登录
    Route::get('/logout','AdminController@logout')->name('logout');
    // 添加管理员
    Route::post('/admin/add','AdminController@add')->name('admin.add');
    Route::get('/admin/destroy/{id}','AdminController@destroy')->name('admin.destroy');
    Route::post('/admin/update/pwd','AdminController@update_pwd')->name('admin.update.pwd');

    // 管理员
    Route::get('/privilege/index','PrivilegeController@index')->name('privilege.index');
    Route::get('/privilege/show','PrivilegeController@show')->name('privilege.show');
    Route::get('/privilege/create','PrivilegeController@create')->name('privilege.create');
    Route::post('/privilege/store','PrivilegeController@store')->name('privilege.store');
    Route::get('/privilege/edit/{id}','PrivilegeController@edit')->name('privilege.edit');
    Route::patch('/privilege/update/{id}','PrivilegeController@update')->name('privilege.update');
    Route::get('/privilege/destroy/{id}','PrivilegeController@destroy')->name('privilege.destroy');
  
});
// 登录
Route::get('/login','AdminController@login')->name('login');
// 提交登录
Route::post('/login','AdminController@dologin')->name('dologin');
