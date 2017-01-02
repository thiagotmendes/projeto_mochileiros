<?php
Route::get('/', function () {
    return view('welcome');
});
Route::get('/register', function(){
  return view('form.register');
});
Route::auth();
Route::get('/home', 'HomeController@index');
Route::group(['prefix' => '/home'], function(){
  Route::post('addchave', 'HomeController@insereChave');
  Route::get('/{id}/{pais?}', 'HomeController@listaJogosPaises');
});
// ROTA DOS JOGOS
Route::get('/executajogo/{idJogos}', 'JogosController@ExecutaJogo');
// GRUPO DE ROTA PARA USUARIOS
Route::group(['prefix' => 'addUser'], function () {
  Route::get('formuser','UsuariosController@index');
  Route::get('listaUsuarios','UsuariosController@gridUsuario');
  Route::post('adicionar','UsuariosController@createUser');
  Route::get('formuser/{id}', 'UsuariosController@updateUsuario');
});
// GRUPO DE ROTAS PARA CONTROLE DE JOGOS
Route::get('/addjogo', 'JogosController@index');
Route::group(['prefix' => 'addjogo'], function(){
  Route::get('listaJogos', 'JogosController@viewJogos');
  Route::get('listaJogos/{id}', 'JogosController@formEditaJogo');
  Route::post('/adicionar', 'JogosController@createJogos');
  Route::get('excluir/{id}','JogosController@excluirJogo');
});
// GRUPO ROTAS PARA PAIS
Route::get('addpais', 'PaisController@index');
Route::group(['prefix' => 'addpais'], function(){
  Route::get('listaPaises/{idpais}', 'PaisController@updatePais');
  Route::post('adicionar', 'PaisController@createPais');
  Route::get('listaPaises', 'PaisController@listaPaises');
  Route::get('excluir/{idpais}', 'PaisController@excluirPais');
});
