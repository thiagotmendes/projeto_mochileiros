<?php
Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function(){
  return view('form.register');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'addUser'], function () {
  Route::get('formuser','UsuariosController@index');
  Route::post('adicionar','UsuariosController@createUser');
});

Route::group(['prefix' => 'jogos'], function () {
  Route::get('jogo1', function(){
    return view('games.jogos');
  });
});


Route::get('/addjogo', function(){
  return view('form.formAdicionaJogo');
});
