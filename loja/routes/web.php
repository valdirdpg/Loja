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

/*Route::get('/', function () {
    return view('welcome');
});*/
//O post é usado na rota que aponta para o código que processará a informação
$this->post('novo-usuario','UserController@cadastrar');
//O GET é usado na rota que apontará para o formulário de entrada de dados ou views
Route::get('cadastrar', 'UserController@register');//->name('usuario.cadastrar');
Route::post('alterar',   'UserController@update');//->name('profile.update');
$this->get('perfil', 'UserController@profile');
$this->get('logout', 'UserController@logout');
Route::get('/','EscolaController@index')->name('home');
//Route::get('/login', 'EscolaController@login');
Auth::routes();


//Route::get('/home', 'HomeController@index')->name('home');


