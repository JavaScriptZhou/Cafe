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


//移动端路由
Route::get('/m',function(){
    return view('m/master');
});

//产品精选
Route::get('/m/product_leader','admin\ProductController@m_product_leader');

//主题列表
Route::get('/m/theme_list','admin\CateController@m_theme_list');

//菜单列表
Route::get('/m/order/m_list','admin\CateController@m_order_list');

Route::post('/m/recommend/data/{theme_idPageIndex}','admin\ProductController@m_recommend');
Route::post('/user/m_login','User\UserController@m_login');

Route::post('/user/m_register','User\UserController@m_register');

Route::post('/user/m_update','User\UserController@m_update');


/*
 * 通过控制器加载页面
 * 启动Laravel:php artisan serve
 * 生成APP_KEY:php artisan key:generate
 * 生成控制器：php artisan make:controller IndexController
 *artisan工匠可以做很多事  php artisan 进行查看即可
 *
 *
 * */




//后台管理登录
Route::get('/login', 'Auth\LoginController@index');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout');




//后台管理
Route::prefix('/admin')->namespace('Admin')->group(function(){





    //用户管理
    Route::get('user/add','UserController@add');
    Route::post('user/insert','UserController@insert');

    Route::get('user/{user}/edit','UserController@edit');
    Route::post('user/{user}/edit','UserController@save');

    Route::get('user/delete/{id}','UserController@delete');
    Route::get('user','UserController@index');






    //修改属性值的所属或名称
    Route::post('product/edit_prop_value','ProductController@edit_prop_value');
    //获取所有的属性
    Route::get('product/all_props/{prop_value_id}','ProductController@all_props');

    //设置产品的默认属性值
    Route::get('product/edit_default_prop/{defaults}','ProductController@edit_default_prop');


    //添加产品的可能属性值
    Route::get('product/add_prop_values/{data_ids}','ProductController@add_prop_values');

    //添加新的属性值名称
    Route::post('product/prop_value','ProductController@prop_value');

    //添加新的属性名称
    Route::post('product/prop_name','ProductController@prop_name');

    //店家推荐/取消推荐某个产品
    Route::get('product/recommend/{product}','ProductController@recommend');
    //产品管理
    Route::resource('product','ProductController');




    //产品分类列表
    Route::resource('cate','CateController');

    //订单列表
    Route::get("order","OrderController@index");
    //查看订单详情
    Route::get("order_detail/{id}","OrderController@order_detail");

    //删除订单
    Route::get("del/{id}","OrderController@del");

});






