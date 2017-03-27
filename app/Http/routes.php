<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


# ミドルウェアの為webグループ指定
Route::group(['middleware' => 'web'], function() {
    # 認証系ページ
    Route::group(['prefix' => 'auth'], function() {
        // 登録
        Route::get('/register', 'Auth\AuthController@getRegister');
        Route::post('/register', 'Auth\AuthController@postRegister');
        // 認証
        Route::get('/login', 'Auth\AuthController@getLogin');
        Route::post('/login', 'Auth\AuthController@postLogin');
        Route::get('/logout', 'Auth\AuthController@logout');
    });

    # auth
    Route::group(['middleware' => 'auth'], function() {
        # TOPページ
        Route::get('/', function(){
            return view('index');
        });

        # 会員系ページ
        Route::group(['prefix' => 'member'], function() {
            Route::get('/', 'MemberController@index');
            Route::post('/add', 'MemberController@add');
            Route::post('/edit', 'MemberController@edit');
            Route::delete('/delete/{member_id}', 'MemberController@delete');
        });

        # サービス系ページ
        Route::group(['prefix' => 'service'], function() {
            Route::get('/', 'ServiceController@index');
            Route::post('/add', 'ServiceController@add');
            Route::post('/edit', 'ServiceController@edit');
            Route::get('/detail/{service_id}', 'ServiceController@detail');
            Route::delete('/delete/{service_id}', 'ServiceController@delete');
        });

        # 会員サービス設定ページ
        Route::group(['prefix' => 'member_use_service'], function() {
            Route::get('/', 'MemberUseServiceController@index');
            Route::post('/add', 'MemberUseServiceController@add');
        });
    });
});