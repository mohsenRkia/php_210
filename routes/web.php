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

/**
 * ROUTES OF SITE
 */

Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => 'home.index'
]);

Route::group(['prefix' => 'single'],function (){

    Route::get('/{id}', [
        'uses' => 'HomeController@show',
        'as' => 'place.show'
    ]);

    Route::get('order/{id}',[
        'uses' => 'OrderController@first',
        'as' => 'order.first'
    ]);

    Route::post('order/{id}',[
        'uses' => 'OrderController@submit',
        'as' => 'order.submit'
    ]);
    Route::post('finall',[
        'uses' => 'OrderController@finall',
        'as' => 'order.finall'
    ]);

});
    /**
    * ROUTES OF PROFILE PAGES
    */

    Route::group(['prefix' => 'profile','middleware' => 'iscostumer'],function (){

        Route::get('/index' , [
            'uses' => 'ProfileController@index',
            'as' => 'profile.index'
        ]);
        Route::get('/myorders' , [
            'uses' => 'ProfileController@orders',
            'as' => 'profile.myorders'
        ]);
    });

    /**
     * ROUTES OF ADMIN PAGES
     */
    Route::group(['prefix' => 'admin','middleware' => 'isadmin'],function (){


    Route::get('dashboard',[
        'uses' => 'AdminpanelController@index',
        'as' => 'admin.index'
    ]);

    /**
     * ROUTES OF CATEGORIS
     */
    Route::group(['prefix' => 'category'],function (){

        Route::get('/',[
            'uses' => 'CategoryController@index',
            'as' => 'category.index'
        ]);
        Route::get('/create',[
            'uses' => 'CategoryController@create',
            'as' => 'category.create'
        ]);
        Route::post('/store',[
            'uses' => 'CategoryController@store',
            'as' => 'category.store'
        ]);
        Route::get('/show/{id}',[
            'uses' => 'CategoryController@show',
            'as' => 'category.show'
        ]);

        Route::get('/edit/{id}',[
            'uses' => 'CategoryController@edit',
            'as' => 'category.edit'
        ]);
        Route::post('/update/{id}',[
            'uses' => 'CategoryController@update',
            'as' => 'category.update'
        ]);
        Route::get('/delete/{id}',[
            'uses' => 'CategoryController@destroy',
            'as' => 'category.destroy'
        ]);

    });

        /**
         * ROUTES OF ADD PLACES
         */
        Route::group(['prefix' => 'place'], function (){

            Route::get('/',[
                'uses' => 'PlaceController@index',
                'as' => 'place.index'
            ]);
            Route::get('/create',[
                'uses' => 'PlaceController@create',
                'as' => 'place.create'
            ]);
            Route::post('/create',[
                'uses' => 'PlaceController@store',
                'as' => 'place.store'
            ]);
            Route::get('/edit/{id}',[
                'uses' => 'PlaceController@edit',
                'as' => 'place.edit'
            ]);
            Route::post('/update/{id}',[
                'uses' => 'PlaceController@update',
                'as' => 'place.update'
            ]);
            Route::get('/delete/{id}',[
                'uses' => 'PlaceController@destroy',
                'as' => 'place.destroy'
            ]);

        });


        /**
         * ROUTES OF USERS
         */
Route::group(['prefix' => 'users'], function (){

    Route::get('/',[
        'uses' => 'UsersController@index',
        'as' => 'users.index'
    ]);
    Route::get('/create',[
        'uses' => 'UsersController@create',
        'as' => 'users.create'
    ]);
    Route::post('/store',[
        'uses' => 'UsersController@store',
        'as' => 'users.store'
    ]);

    Route::get('/edit/{id}',[
        'uses' => 'UsersController@edit',
        'as' => 'users.edit'
    ]);

    Route::post('/update/{id}',[
       'uses' => 'UsersController@update',
        'as' => 'users.update'
    ]);


    Route::get('delete/{id}',[
        'uses' => 'UsersController@destroy',
        'as' => 'users.delete'
    ]);

});

        /**
         * ROUTES OF ADMIN MYORDERS
         */
        Route::get('myorders',[
           'uses' => 'AdminpanelController@myorder',
           'as' => 'admin.myorders'
        ]);
        Route::get('allorders',[
            'uses' => 'AdminpanelController@allorders',
            'as' => 'admin.allorders'
        ]);


});
/**
 * ROUTES OF AUTHENTICATION
 */
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
