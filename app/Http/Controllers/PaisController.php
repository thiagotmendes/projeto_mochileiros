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
    $idPais         = $addPais->idpais;
    $nomePais       = $addPais->pais;
    $chavePais      = $addPais->chave;
    $descricaoPais  = $addPais->descricao;

    if ($addPais->_token) {
      if(empty($idPais)){
        DB::table('pais')->insert(
          [
            'nome'        => $nomePais,
            'chave'       => $chavePais,
            'descricao'    => $descricaoPais,
            'created_at'  =>  DB::raw('now()')
          ]
        );
        return redirect('addpais/?msg=ok');
      } else{
        DB::table('pais')
        ->where('idpais', $idPais)
        ->update(
          [
            'nome'        => $nomePais,
            'chave'       => $chavePais,
            'descricao'    => $descricaoPais,
            'created_at'  =>  DB::raw('now()')
          ]
        );
        return redirect('addpais/listaPaises/'.$idPais.'?msg=update_ok');
      }
    } else {
      return redirect('addpais/?msg=error');
    }
  }

  public function updatePais($idpais)
  {
    $queryPaisUpdate = DB::table('pais')
                        ->where('idpais', '=' , $idpais)
                        ->get();
    return view('form.formPais', ['idpais' => $queryPaisUpdate]);
  }

  public function excluirPais($idpais)
  {
    if(!empty($idpais) and is_numeric($idpais)){
      DB::table('pais')->where('idpais', '=', $idpais)->delete();
      return redirect('addpais/listaPaises?msg=exc');
    }
  }

  public function listaPaises()
  {
    $queryPais = DB::table('pais')->get();
    return view('grid.gridPaises',['listaPaises' => $queryPais]);
  }


}
