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
    $idUser   = $addUser->idusuario;

    if (!empty($idUser)) {
      if ($addUser->_token) {
        DB::table('users')
            ->where('id', $idUser)
            ->update(['name' => $nome, 'email' => $email]);
      }
      return redirect('addUser/formuser/'.$idUser.'?msg=okupdate');
    } else {
      if ($addUser->_token) {
        $queryVerificaEmail = DB::table('users')
                    ->where('email','=',$email)
                    ->select('email')
                    ->get();

        if(empty($queryVerificaEmail[0]->email)):
          DB::table('users')->insert(
            [
              'name'        => $nome,
              'email'       => $email,
              'password'    => $password,
              'estatus'     => '1',
              'tipoUsuario' => '1',
              'created_at'  =>  DB::raw('now()')
            ]
          );

          return redirect('addUser/formuser/?msg=ok');
        else:
          return redirect('addUser/formuser/?msg=error_email');
        endif;
      } else {
        return redirect('addUser/formuser/?msg=error');
      }
    }
  }

  public function gridUsuario()
  {
    $queryUsers = DB::table('users')->get();
    return view('grid.gridUsuario', ['gridUsers' => $queryUsers]);
  }

  public function updateUsuario($id)
  {
    $queryUsers = DB::table('users')
                ->where('id','=',$id)
                ->get();
    return view('form.formUsuario', ['formUpdate' => $queryUsers]);
  }

  public function excluirUser($idUser)
  {
    DB::table('users')->where('id', '=', $idUser)->delete();
    return redirect('addUser/listaUsuarios?msg=exc');
  }

}
