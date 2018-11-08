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

// 管理员后台
// 
// 
// 中间件
Route::middleware(['privilege'])->group(function(){

    // 主页
    Route::get('/admin','Admin\IndexController@index')->name('admin.adminIndex');
    // 首页
    Route::get('/admin/home','Admin\IndexController@home')->name('admin.home');

    // 产品管理 #####
    // 产品类
    Route::get('/admin/goods/manage','Admin\ProductsController@goods_manage')->name('admin.goods.manage');
    // 添加商品
    // Route::get('/admin/goods/create','Admin\ProductsController@goods_create')->name('admin.goods.create');
    // Route::post('/admin/goods/store','Admin\ProductsController@goods_store')->name('admin.goods.store');
    // 商品删除，修改
    Route::get('/admin/goods/delete/{$id}','Admin\ProductsController@goods_delete')->name('admin.goods.delete');
    Route::get('/admin/goods/edit/{$id}','Admin\ProductsController@goods_edit')->name('admin.goods.edit');
    Route::post('/admin/goods/update','Admin\ProductsController@goods_update')->name('admin.goods.update');

    // 品牌管理
    Route::get('/admin/brand/manage','Admin\ProductsController@brand_manage')->name('admin.brand.manage');
    // 添加品牌
    Route::get('/admin/brand/create','Admin\ProductsController@brand_create')->name('admin.brand.create');
    Route::post('/admin/brand/store','Admin\ProductsController@brand_store')->name('admin.brand.store');
    // 品牌删除，修改
    Route::get('/admin/brand/delete/{$id}','Admin\ProductsController@brand_delete')->name('admin.brand.delete');
    Route::get('/admin/brand/edit/{$id}','Admin\ProductsController@brand_edit')->name('admin.brand.edit');
    Route::post('/admin/brand/update','Admin\ProductsController@brand_update')->name('admin.brand.update');

    // 分类管理
    Route::get('/admin/category/manage','Admin\ProductsController@category_manage')->name('admin.category.manage');
    // 分类添加
    Route::get('/admin/category/create','Admin\ProductsController@category_create')->name('admin.category.create');
    Route::post('/admin/category/store','Admin\ProductsController@category_store')->name('admin.category.store');
    // 删除分类,修改
    Route::get('/admin/category/delete/{$id}','Admin\ProductsController@category_delete')->name('admin.category.delete');
    Route::get('/admin/category/edit/{$id}','Admin\ProductsController@category_edit')->name('admin.category.edit');
    Route::post('/admin/category/update','Admin\ProductsController@category_update')->name('admin.category.update');

    // 图片管理 #####
    // 广告管理
    Route::get('/admin/advertising/manage','Admin\PictureController@advertising_manage')->name('admin.advertisingManage');
    // 分类管理
    Route::get('/admin/pictureCategory/manage','Admin\PictureController@pictureCategory_manage')->name('admin.pictureCategoryManage');

    // 交易管理 #####
    // 交易信息
    Route::get('/admin/transaction/info','Admin\transactionController@transaction_info')->name('admin.transactionInfo');
    // 交易订单
    Route::get('/admin/order/chart','Admin\transactionController@order_chart')->name('admin.orderChart');
    // 订单管理
    Route::get('/admin/order/manage','Admin\transactionController@order_manage')->name('admin.orderManage');
    // 交易金额
    Route::get('/admin/transaction/amounts','Admin\transactionController@transaction_amounts')->name('admin.transactionAmounts');
    // 订单处理
    Route::get('/admin/order/handling','Admin\transactionController@order_handling')->name('admin.orderHandling');
    // 退款管理
    Route::get('/admin/refund/manage','Admin\transactionController@refund_manage')->name('admin.refundManage');

    // 支付管理 #####
    // 账户管理
    Route::get('/admin/account/manage','Admin\PaymentController@account_manage')->name('admin.accountManage');
    // 支付方式
    Route::get('/admin/payment/method','Admin\PaymentController@payment_method')->name('admin.paymentMethod');
    // 支付配置
    Route::get('/admin/payment/configure','Admin\PaymentController@payment_configure')->name('admin.paymentConfigure');
    // 账户信息
    Route::get('/admin/account/Information','Admin\PaymentController@account_information')->name('admin.accountInformation');

    // 会员管理 #####
    // 会员列表
    Route::get('/admin/member/list','Admin\MemberController@member_list')->name('admin.memberList');
    // 等级管理
    Route::get('/admin/grade/manage','Admin\MemberController@grade_manage')->name('admin.gradeManage');
    // 会员记录管理
    Route::get('/admin/record/manage','Admin\MemberController@record_manage')->name('admin.recordManage');

    // 店铺管理 #####
    // 店铺列表
    Route::get('/admin/shop/list','Admin\ShopController@shop_list')->name('admin.shopList');
    // 店铺审核
    Route::get('/admin/shop/audit','Admin\ShopController@shop_audit')->name('admin.shopAudit');

    // 消息管理 #####
    // 消息列表
    Route::get('/admin/News/guestbook','Admin\NewsController@guestbook')->name('admin.guestbook');
    // 意见反馈
    Route::get('/admin/News/feedback','Admin\NewsController@feedback')->name('admin.feedback');

    // 消息管理 #####
    // 消息列表
    Route::get('/admin/article/list','Admin\ArticleController@article_list')->name('admin.articleList');
    // 意见反馈
    Route::get('/admin/article/sort','Admin\ArticleController@article_sort')->name('admin.articleSort');

    // 系统管理 #####
    // 系统设置
    Route::get('/admin/system/setup','Admin\SystemController@system_setup')->name('admin.systemSetup');
    // 系统栏目管理
    Route::get('/admin/system/section','Admin\SystemController@system_section')->name('admin.systemSection');
    // 系统日志
    Route::get('/admin/system/logs','Admin\SystemController@system_logs')->name('admin.systemLogs');

    // 管理员管理 #####
    // 权限管理
    Route::get('/admin/privilege','Admin\AdminController@admin_privilege')->name('admin.adminPrivilege');
    // 管理员列表
    Route::get('/admin/list','Admin\AdminController@admin_list')->name('admin.adminList');
    // 个人信息
    Route::get('/admin/info','Admin\AdminController@info')->name('admin.info');
    // 退出登录
    Route::get('/admin/logout','Admin\AdminController@logout')->name('admin.logout');
    // 添加管理员
    Route::post('/admin/add','Admin\AdminController@add')->name('admin.add');
    Route::get('/admin/destroy/{id}','Admin\AdminController@destroy')->name('admin.destroy');
    Route::post('/admin/update/pwd','Admin\AdminController@update_pwd')->name('admin.update.pwd');

    // 管理员
    Route::get('/admin/privilege/index','Admin\PrivilegeController@index')->name('admin.privilege.index');
    Route::get('/admin/privilege/show','Admin\PrivilegeController@show')->name('admin.privilege.show');
    Route::get('/admin/privilege/create','Admin\PrivilegeController@create')->name('admin.privilege.create');
    Route::post('/admin/privilege/store','Admin\PrivilegeController@store')->name('admin.privilege.store');
    Route::get('/admin/privilege/edit/{id}','Admin\PrivilegeController@edit')->name('admin.privilege.edit');
    Route::patch('/admin/privilege/update/{id}','Admin\PrivilegeController@update')->name('admin.privilege.update');
    Route::get('/admin/privilege/destroy/{id}','Admin\PrivilegeController@destroy')->name('admin.privilege.destroy');
  
});
// 登录
Route::get('/admin/login','Admin\AdminController@login')->name('admin.login');
// 提交登录
Route::post('/admin/login','Admin\AdminController@dologin')->name('admin.dologin');
// 
// 
// 
// 
// 
// 管理员后台

// 商家后台
// 
// 
// 
// 
// 中间件
Route::middleware(['business'])->group(function(){

    Route::get('/business','Business\BusinessController@index')->name('business.index');

    Route::get('/business/home','Business\BusinessController@home')->name('business.home');
    // 基本管理
    // 密码修改
    Route::get('/business/edit/pwd','Business\BusinessController@edit_pwd')->name('business.edit_pwd');
    Route::post('/business/update/pwd','Business\BusinessController@update_pwd')->name('business.update_pwd');
    // 信息修改
    Route::get('/business/edit/info','Business\BusinessController@edit_info')->name('business.edit_info');
    Route::post('/business/update/info','Business\BusinessController@update_info')->name('business.update_info');

    // 商品管理
    Route::get('/business/goods/index','Business\GoodsController@index')->name('business.goods.index');
    Route::get('/business/goods/create','Business\GoodsController@create')->name('business.goods.create');
    // 商品添加
    Route::post('/business/goods/store','Business\GoodsController@store')->name('business.goods.store');
    // ajax三级联动
    Route::get('/business/category/ajax','Business\GoodsController@category_ajax')->name('category.ajax');

    // 退出登录
    Route::get('/business/logout','Business\BusinessController@logout')->name('business.logout');

});

// 商家注册
Route::get('/business/register','Business\BusinessController@register')->name('business.register');
Route::post('/business/doregister','Business\BusinessController@doregister')->name('business.doregister');
// 登录
Route::get('/business/login','Business\BusinessController@login')->name('business.login');
Route::post('/business/dologin','Business\BusinessController@dologin')->name('business.dologin');
// 入驻协议
Route::get('/business/sampling','Business\BusinessController@sampling')->name('business.sampling');
Route::get('/business/cooperation','Business\BusinessController@cooperation')->name('business.cooperation');
// 
// 
// 
// 
// 商家后台

// 网站前台
// 
// 
// 
// 
Route::middleware(['user'])->group(function(){
    // 首页
    Route::get('/','Goods\GoodsController@index')->name('goods.index');
    // 商品列表（类型）
    Route::get('/goods/list/{id}','Goods\GoodsController@list')->name('goods.list');
    // 商品详情页
    Route::get('/goods/item/{id}','Goods\GoodsController@item')->name('goods.item');
    // 加入购物车
    Route::post('/goods/cart','Goods\GoodsController@cart')->name('goods.cart');
    // 退出登录
    Route::get('/user/logout','Goods\UserController@logout')->name('user.logout');

});

// 用户注册
Route::get('/user/register','Goods\UserController@register')->name('user.register');
Route::post('/user/doregister','Goods\UserController@doregister')->name('user.doregister');
// 登录
Route::get('/user/login','Goods\UserController@login')->name('user.login');
Route::post('/user/dologin','Goods\UserController@dologin')->name('user.dologin');




// 
// 
// 
// 
// 网站前台