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

Route::get('/', function () {
    return view('welcome');
});

//用户添加路由
Route::get('user/add','UserController@add');

//执行用户添加路由
Route::post('user/store','UserController@store');

//提交成功后的列表页
Route::get('user/index','UserController@index');

//修改路由
Route::get('user/edit/{id}','UserController@edit');

//
Route::post('user/update','UserController@update');

//删除
Route::get('user/del/{id}','UserController@del');
