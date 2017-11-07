<?php
header('content-type:text/html;charset="utf-8";');
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


// Route::get('/', function () {
//     return view('welcome');
// });

/* 后台 首页 路由 */
Route::get('back', 'Backend\IndexController@index');
Route::any('index', 'Backend\indexController@index');


/**  个人资料路由  */
Route::post('personal_data', 'Backend\personalController@personal');


///* 登录 注册 */
Route::any('login', 'Backend\loginController@login');
Route::any('register', 'Backend\loginController@register');
Route::any('logout', 'Backend\loginController@logout');


/*  企业分类添加  */
Route::any('classify', 'Backend\classifyController@classify');
Route::any('classify_add', 'Backend\classifyController@classify_add');
Route::any('classify_show', 'Backend\classifyController@classify_show');
Route::any('classify_del/{id}', 'Backend\classifyController@classify_del');
Route::get('classify_save/{id}', 'Backend\classifyController@classify_save');
Route::any('classify_saves', 'Backend\classifyController@classify_saves');
Route::any('classify_recycle/{id}', 'Backend\classifyController@classify_recycle');
Route::get('classify_gai/{id}/{show}', 'Backend\classifyController@gai');

/*  企业  添加 */
Route::any('shop_show', 'Backend\PhotoController@photo_album');
Route::any('shop_add', 'Backend\PhotoController@photo_add');


/* 公司注册  */
Route::any('job', 'Backend\JobController@jobs');
Route::post('job_add', 'Backend\JobController@job_add');
Route::any('job_show', 'Backend\JobController@job_show');
Route::get('job_save/{id}', 'Backend\JobController@job_save');
Route::post('job_saves', 'Backend\JobController@job_saves');
Route::post('job_del', 'Backend\JobController@job_del');


/* RBAC  */
Route::any('admin', 'Backend\AdminController@admin');
Route::any('admin_add', 'Backend\AdminController@admin_add');
Route::any('admin_role', 'Backend\AdminController@admin_role');
Route::any('admin_show', 'Backend\AdminController@admin_show');
Route::get('admin_del/{id}', 'Backend\AdminController@admin_delete');
Route::get('admin_save/{id}', 'Backend\AdminController@admin_save');
Route::post('admin_saves', 'Backend\AdminController@admin_saves');
Route::get('admin_gai/{id}', 'Backend\AdminController@gai');
Route::get('admin_search/{con}', 'Backend\AdminController@search');

/* 角色 管路 */
Route::any('role', 'Backend\RoleController@role');
Route::any('role_add', 'Backend\RoleController@role_add');
Route::any('role_authz', 'Backend\RoleController@role_authz');
Route::any('role_show', 'Backend\RoleController@role_show');
Route::any('role_del/{id}', 'Backend\RoleController@role_delete');
Route::get('role_save/{id}', 'Backend\RoleController@role_save');
Route::post('role_saves', 'Backend\RoleController@role_saves');
Route::get('role_gai/{id}/{show}', 'Backend\RoleController@gai');
Route::get('role_search/{con}', 'Backend\RoleController@search');


/* 权限 管理 */
Route::any('authz', 'Backend\AuthzController@authz');
Route::any('authz_add', 'Backend\AuthzController@authz_add');
Route::any('authz_show', 'Backend\AuthzController@authz_show');
Route::any('authz_del/{id}', 'Backend\AuthzController@authz_delete');
Route::get('authz_save/{id}', 'Backend\AuthzController@authz_save');
Route::post('authz_saves', 'Backend\AuthzController@authz_saves');
Route::get('authz_gai/{id}/{show}', 'Backend\AuthzController@gai');
Route::get('authz_search/{con}', 'Backend\AuthzController@search');


/*  后台新闻添加  */
Route::any('press', 'Backend\PressController@press');
Route::any('press_add', 'Backend\PressController@press_add');
Route::any('press_show', 'Backend\PressController@press_show');
Route::any('press_del/{id}', 'Backend\PressController@press_del');
Route::any('press_save/{id}', 'Backend\PressController@press_save');


/* 后台栏目 操作 */
Route::any('navbar', 'Backend\NavbarController@navbar');
Route::any('navbar_add', 'Backend\NavbarController@navbar_add');
Route::any('navbar_show', 'Backend\NavbarController@navbar_show');
Route::get('navbar_save/{id}', 'Backend\NavbarController@navbar_save');
Route::post('navbar_saves', 'Backend\NavbarController@navbar_saves');
Route::any('navbar_del', 'Backend\NavbarController@navbar_del');


/* 系统 配置当中 meta 管理  */
Route::any('meta/{id}', 'Backend\metaController@meta');
Route::post('meta_add', 'Backend\metaController@meta_add');
Route::any('meta_show', 'Backend\metaController@meta_show');
Route::any('meta_save/{id}', 'Backend\metaController@meta_save');
Route::any('meta_saves', 'Backend\metaController@meta_saves');
Route::any('meta_del/{id}', 'Backend\metaController@meta_show');


/* 数据库的备份 */
Route::any('database_data', 'Backend\DatabaseController@data');
Route::any('database_backups', 'Backend\DatabaseController@backups');
Route::any('restore_html', 'Backend\DatabaseController@restore_html');
Route::any('database_restore', 'Backend\DatabaseController@restore');


/* 一键 生成 CURD  */
Route::any('curd_create', 'Backend\CurdController@curd_create');
Route::any('controller_model', 'Backend\CurdController@controller_model');
//Route::any('curd_show', 'Backend\CurdController@curd_show');


/*  网站 pv  uv 统计  */
Route::any('pu', 'Backend\PuController@pu_v');

/* 广告配置 */
Route::any('', 'Backend\ObController@ob');

/* 一键生成 缓存 */
Route::any('create_ob', 'Backend\ObController@ob');
Route::any('del_ob', 'Backend\ObController@del_ob');

/* 回收站的操作 */
Route::any('recvcle', 'Backend\RecvcleController@recvcle_show');
Route::any('recvcle_del/{id}/{shop_id}', 'Backend\RecvcleController@recvcle_del');
Route::any('recvcle_restore/{id}/{shop_id}', 'Backend\RecvcleController@recvcle_restore');


/* 管理员的操作记录 */
Route::any('handle_show', 'Backend\HandleController@handle_show');

/* 广告配置 */
Route::any('advertisement_show', 'Backend\AdvertisementController@advertisement_show');
Route::any('advertisement/{id}', 'Backend\AdvertisementController@advertisement');
Route::any('advertisement_add', 'Backend\AdvertisementController@advertisement_add');


/*  前台首页  语言包的替换 */
Route::any('/', 'Home\IndexController@index');
Route::get('indexs/{locale}', 'Home\IndexController@index');
Route::any('home_login', 'Home\loginController@login');
Route::any('login_name/{name}', 'Home\loginController@login_name');
Route::any('login_pwd/{pwd}', 'Home\loginController@login_pwd');
Route::any('logout_out', 'Home\loginController@logout');
Route::any('mm_find', 'Home\loginController@find');
Route::any('find_add', 'Home\loginController@find_add');

/* 产品中心 */
Route::any('product', "Home\JobController@product");


/* 个人信息 */
Route::any('contact', 'Home\ContactController@contact_show');

/* 密码修改  */
Route::any('mm_save', 'Home\loginController@mm_save');
Route::post('mm_saves', 'Home\loginController@mm_saves');

/* 公司详情页 */
Route::any('job/{id}', 'Home\JobController@job');

/*  公司留言  */
Route::any('job_message/{content}/{token}', 'Home\JobController@job_message');

/*  商品的简介  */
Route::any('shop_xq', 'Home\IndexController@shop');
Route::any('new_xq', 'Home\IndexController@new_list');



Route::any('tfl_save/{id}', 'Backend\TflController@Tfl_save');
Route::any('tfl_saves', 'Backend\TflController@Tfl_saves');
Route::any('tfl_del/{id}', 'Backend\TflController@Tfl_del');
Route::any('tfl_show', 'Backend\TflController@Tfl_show');
