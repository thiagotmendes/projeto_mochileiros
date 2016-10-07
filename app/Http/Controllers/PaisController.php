<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;

class PaisController extends Controller
{
  // FAZ A VALIDAÇÃO PARA DEIXAR ACESSAR AS PARTES INTERNAS DO SISTEMA
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    return view('form.formPais');
  }

  // cria o pais
  public function createPais(Request $addPais)
  {
    $nomePais = $addPais->pais;
    $chavePais = $addPais->chave;
    $descricaoPais = $addPais->descricao;

    if ($addPais->_token) {
      DB::table('pais')->insert(
        [
          'nome'        => $nomePais,
          'chave'       => $chavePais,
          'descricao'    => $descricaoPais,
          'created_at'  =>  DB::raw('now()')
        ]
      );
      return redirect('addpais/?msg=ok');
    } else {
      return redirect('addpais/?msg=error');
    }
  }


}
