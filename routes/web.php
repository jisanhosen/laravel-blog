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

Route::get('/' , 'FrontendController@index');
Route::get('/about' , 'FrontendController@about');
Route::get('/services' , 'FrontendController@services');
Route::get('/contact' , 'FrontendController@contact');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/category/add', 'CategoryController@index');
Route::post('/category/new', 'CategoryController@saveCategoryInfo');
Route::get('/category/manage', 'CategoryController@manageCategoryInfo');
Route::get('/category/edit/{id}', 'CategoryController@editCategoryInfo');
Route::post('/category/update', 'CategoryController@updateCategoryInfo');
Route::get('/category/delete/{id}', 'CategoryController@deleteCategoryInfo');

//Route::get('/blog/add', 'BlogController@index')->middleware('AuthenticateMiddleware');
//Route::post('/blog/new', 'BlogController@saveBlogInfo')->middleware('AuthenticateMiddleware');
//Route::get('/blog/manage', 'BlogController@manageBlogInfo')->middleware('AuthenticateMiddleware');
//Route::get('/blog/view/{id}', 'BlogController@viewBlogInfo')->middleware('AuthenticateMiddleware');
//Route::get('/blog/unpublished/{id}', 'BlogController@unpublishedBlogInfo')->middleware('AuthenticateMiddleware');
//Route::get('/blog/published/{id}', 'BlogController@publishedBlogInfo')->middleware('AuthenticateMiddleware');
//Route::get('/blog/edit/{id}', 'BlogController@editBlogInfo')->middleware('AuthenticateMiddleware');
//Route::Post('/blog/update', 'BlogController@updateBlogInfo')->middleware('AuthenticateMiddleware');
//Route::get('/blog/delete/{id}', 'BlogController@deleteBlogInfo')->middleware('AuthenticateMiddleware');

Route::group(['middleware' => 'AuthenticateMiddleware'], function (){
    Route::get('/blog/add', 'BlogController@index');
    Route::post('/blog/new', 'BlogController@saveBlogInfo');
    Route::get('/blog/manage', 'BlogController@manageBlogInfo');
    Route::get('/blog/view/{id}', 'BlogController@viewBlogInfo');
    Route::get('/blog/unpublished/{id}', 'BlogController@unpublishedBlogInfo');
    Route::get('/blog/published/{id}', 'BlogController@publishedBlogInfo');
    Route::get('/blog/edit/{id}', 'BlogController@editBlogInfo');
    Route::Post('/blog/update', 'BlogController@updateBlogInfo');
    Route::get('/blog/delete/{id}', 'BlogController@deleteBlogInfo');
});

