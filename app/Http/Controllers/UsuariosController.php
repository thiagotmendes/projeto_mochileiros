<?php
namespace App\Http\Controllers;

// IMPORTA AS BIBLIOTECAS
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;

class UsuariosController extends Controller
{
  // FAZ A VALIDAÇÃO PARA DEIXAR ACESSAR AS PARTES INTERNAS DO SISTEMA
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    return view('form.formUsuario');
  }

  public function createUser(Request $addUser)
  {
    $nome     = $addUser->nome;
    $email    = $addUser->email;
    $password = bcrypt($addUser->password);

    if ($addUser->_token) {
      DB::table('users')->insert(
        [
          'name'        => $nome,
          'email'       => $email,
          'password'    => $password,
          'created_at'  =>  DB::raw('now()')
        ]
      );
      return redirect('addUser/formuser/?msg=ok');
    } else {
      return redirect('addUser/formuser/?msg=error');
    }
  }


}
