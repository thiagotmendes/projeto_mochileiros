<?php
Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function(){
  return view('form.register');
});

Route::auth();

Route::get('/home', 'HomeController@index');

// GRUPO DE ROTA PARA USUARIOS
Route::group(['prefix' => 'addUser'], function () {
  Route::get('formuser','UsuariosController@index');
  Route::get('listaUsuarios','UsuariosController@gridUsuario');
  Route::post('adicionar','UsuariosController@createUser');
});

// GRUPO DE ROTAS PARA JOGOS
Route::group(['prefix' => 'jogos'], function () {
  Route::get('jogo1', function(){
    return view('games.jogos');
  });
});

// GRUPO DE ROTAS PARA CONTROLE DE JOGOS
Route::get('/addjogo', 'JogosController@index');
Route::group(['prefix' => 'addjogo'], function(){
  Route::get('listaJogos', 'JogosController@viewJogos');
  Route::post('/adicionar', 'JogosController@createJogos');
});

// GRUPO ROTAS PARA PAIS
Route::get('addpais', 'PaisController@index');
Route::group(['prefix' => 'addpais'], function(){
  Route::post('adicionar', 'PaisController@createPais');
});
