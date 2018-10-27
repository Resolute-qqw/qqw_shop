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

Route::get('/','BusinessController@index')->name('business.index');

Route::get('/home','BusinessController@home')->name('business.home');
// 基本管理
// 密码修改
Route::get('/edit/pwd','BusinessController@edit_pwd')->name('business.edit_pwd');
Route::post('/update/pwd','BusinessController@update_pwd')->name('business.update_pwd');
// 信息修改
Route::get('/edit/info','BusinessController@edit_info')->name('business.edit_info');
Route::post('/update/info','BusinessController@update_info')->name('business.update_info');
// 商家注册
Route::get('/register','BusinessController@register')->name('business.register');
Route::post('/doregister','BusinessController@doregister')->name('business.doregister');
// 登录
Route::get('/login','BusinessController@login')->name('business.login');
Route::post('/dologin','BusinessController@dologin')->name('business.dologin');
// 入驻协议
Route::get('/sampling','BusinessController@sampling')->name('business.sampling');
Route::get('/cooperation','BusinessController@cooperation')->name('business.cooperation');


// 商品管理
Route::get('/goods/index','GoodsController@index')->name('goods.index');
Route::get('/goods/create','GoodsController@create')->name('goods.create');
