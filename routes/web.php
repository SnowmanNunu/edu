<?php

//后台路由部分（不需要权限判断）
Route::group(['prefix' => 'admin'],function(){
	//后台登录页面
	Route::get('public/login','Admin\PublicController@login') -> name('login');
	//后台登录处理页面
	Route::post('public/check','Admin\PublicController@check');
	//退出地址
	Route::get('public/logout','Admin\PublicController@logout');
});

//后台路由部分（需要权限判断）
Route::group(['prefix' => 'admin','middleware' => 'auth'],function(){
	//后台首页路由
	Route::get('index/index','Admin\IndexController@index');
	Route::get('index/welcome','Admin\IndexController@welcome');
	
});