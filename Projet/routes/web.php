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


Route::get('Articles','ArticleController@getLesArticles');
Route::get('ajoutArticle','ArticleController@ajoutArticle');
Route::post('saisieArticle','ArticleController@postAjoutArticle');
Route::get('Article/{id}','ArticleController@getArticleById');
Route::post('saisieCommentaire','ArticleController@postAjoutCommentaire');

Auth::routes(['register'=>false]);

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
