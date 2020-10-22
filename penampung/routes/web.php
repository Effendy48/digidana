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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/category/{params}', 'HomeController@category')->name('home.category');
Route::get('/detail-article/{id}', 'HomeController@detailArticle')->name('home.detail-article');


Route::get('/send-email', 'Master\SubscriberController@sendEmail')->name('send.email');

// Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');

Route::group(['middleware' => 'auth'], function(){
    Route::group(['prefix' => 'dashboard'], function(){
        Route::get('/', 'DashboardController@index')->name('dashboard.index');
    });

    Route::group(['prefix' => 'menu'], function(){
        Route::get('/', 'Master\MenuController@index')->name('menu.index');
        Route::get('/datatables', 'Master\MenuController@datatables')->name('menu.datatables');
        Route::get('/edit/{id}', 'Master\MenuController@edit')->name('menu.edit');
        Route::patch('/edit/{id}', 'Master\MenuController@update')->name('menu.update');
        Route::post('/simpan', 'Master\MenuController@simpan')->name('menu.simpan');
        Route::get('/hapus/{id}', 'Master\MenuController@delete')->name('menu.hapus');
    });

    Route::group(['prefix' => 'role'], function(){
        Route::get('/', 'Master\RoleController@index')->name('role.index');
        Route::get('/datatables', 'Master\RoleController@datatables')->name('role.datatables');
        Route::get('/setting/{id}', 'Master\RoleController@setting')->name('role.setting');
        Route::post('/save-role/{id}', 'Master\RoleController@save_role')->name('role.save');
    });

    Route::group(['prefix' => 'level'], function(){
        Route::get('/', 'Master\LevelController@index')->name('level.index');
        Route::get('/datatables', 'Master\LevelController@datatables')->name('level.datatables');
        Route::get('/edit/{id}', 'Master\LevelController@edit')->name('level.edit');
        Route::patch('/edit/{id}', 'Master\LevelController@update')->name('level.update');
        Route::post('/simpan', 'Master\LevelController@simpan')->name('level.simpan');
        Route::get('/hapus/{id}', 'Master\LevelController@delete')->name('level.hapus');
    });

    Route::group(['prefix' => 'article'], function(){
        Route::get('/', 'Master\ArticleController@index')->name('article.index');
        Route::get('/input', 'Master\ArticleController@input')->name('article.input');
        Route::get('/preview/{id}', 'Master\ArticleController@previewPost')->name('article.preview');
        Route::post('/edit/{id}', 'Master\ArticleController@update')->name('article.edit');
        Route::post('/simpan', 'Master\ArticleController@simpan')->name('article.simpan');
        Route::get('/hapus/{id}', 'Master\ArticleController@delete')->name('article.delete');
    });

    Route::group(['prefix' => 'account'], function(){
        Route::get('/', 'Master\AccountController@index')->name('account.index');
        Route::get('/datatables', 'Master\AccountController@datatables')->name('account.datatables');
        Route::get('/input', 'Master\AccountController@input')->name('account.input');
        Route::get('/edit/{id}', 'Master\AccountController@edit')->name('account.edit');
        Route::post('/edit/{id}', 'Master\AccountController@update')->name('account.edit');
        Route::post('/simpan', 'Master\AccountController@save')->name('account.simpan');
        Route::get('/delete/{id}', 'Master\AccountController@delete')->name('account.delete');
        Route::get('/detail/{id}', 'Master\AccountController@detail')->name('account.detail');
    });

    Route::group(['prefix' => 'subscriber'], function(){
        Route::get('/', 'Master\SubscriberController@index')->name('subscriber.index');
        Route::get('/datatables', 'Master\SubscriberController@datatables')->name('subscriber.datatables');
        Route::get('/edit/{id}', 'Master\SubscriberController@edit')->name('subscriber.edit');
        Route::patch('/edit/{id}', 'Master\SubscriberController@update')->name('subscriber.update');
        Route::post('/simpan', 'Master\SubscriberController@simpan')->name('subscriber.simpan');
        Route::post('/save-front', 'Master\SubscriberController@saveFrontEnd')->name('subscriber.save.front');
        Route::get('/hapus/{id}', 'Master\SubscriberController@delete')->name('subscriber.hapus');
    });
    


});


Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@loginAccount')->name('account.post.login');
Route::get('register', 'Auth\RegisterController@showRegisterForm')->name('admin.register');
Route::post('register', 'Auth\RegisterController@registerUser')->name('admin.post.register');
Route::get('logout', 'Auth\LoginController@logout')->name('admin.logout');


