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

    /**
     * ROUTING OF DASHBOARD
     */
    Route::group(['prefix' => 'admin'],function (){

    Route::get('dashboard',[
        'uses' => 'AdminpanelController@index',
        'as' => 'admin.index'
    ]);

    /**
     * ROUTING OF CATEGORIS
     */
    Route::get('category',[
        'uses' => 'CategoryController@index',
        'as' => 'category.index'
    ]);
    Route::get('category/create',[
        'uses' => 'CategoryController@create',
        'as' => 'category.create'
    ]);
    Route::post('category/store',[
        'uses' => 'CategoryController@store',
        'as' => 'category.store'
    ]);
    Route::get('category/show/{id}',[
        'uses' => 'CategoryController@show',
        'as' => 'category.show'
    ]);

    Route::get('category/edit/{id}',[
        'uses' => 'CategoryController@edit',
        'as' => 'category.edit'
    ]);
    Route::post('category/update/{id}',[
        'uses' => 'CategoryController@update',
        'as' => 'category.update'
    ]);
    Route::get('category/delete/{id}',[
        'uses' => 'CategoryController@destroy',
        'as' => 'category.destroy'
    ]);
        /**
         * ROUTING OF PLACES
         */
        Route::get('place',[
            'uses' => 'PlaceController@index',
            'as' => 'place.index'
        ]);
        Route::get('place/create',[
            'uses' => 'PlaceController@create',
            'as' => 'place.create'
        ]);
        Route::post('place/create',[
            'uses' => 'PlaceController@store',
            'as' => 'place.store'
        ]);
        Route::get('place/edit/{id}',[
            'uses' => 'PlaceController@edit',
            'as' => 'place.edit'
        ]);
        Route::post('place/update/{id}',[
            'uses' => 'PlaceController@update',
            'as' => 'place.update'
        ]);
        Route::get('place/delete/{id}',[
            'uses' => 'PlaceController@destroy',
            'as' => 'place.destroy'
        ]);

        /**
         * ROUTING OF ...
         */



});
/**
 * ROUTING OF AUTHENTICATION
 */
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
