<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use DB;

class JogosController extends Controller
{
  // FAZ A VALIDAÇÃO PARA DEIXAR ACESSAR AS PARTES INTERNAS DO SISTEMA
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $queryPais = DB::table('pais')->get();
    return view('form.formAdicionaJogo', [ 'buscaPais' => $queryPais ] );
  }

  public function createJogos(Request $addJogos)
  {
    $nome = $addJogos->nome;
    $link = $addJogos->link;
    $paisjogo = $addJogos->paisjogo;
    $sobreJogo = $addJogos->sobreJogo;

    if ($addJogos->_token) {
      DB::table('jogos')->insert(
        [
          'nome'        => $nome,
          'idpais'      => $paisjogo,
          'link'        => $link,
          'descricao'   => $sobreJogo,
          'created_at'  =>  DB::raw('now()')
        ]
      );
      return redirect('addjogo/?msg=ok');
    } else {
      return redirect('addjogo/?msg=error');
    }
  }

  public function viewJogos()
  {
    $queryJogos = DB::table('jogos')
                  ->join('pais', 'jogos.idpais', '=', 'pais.idpais')
                  ->select('jogos.nome as nomeJogo', 'pais.nome as nomePais')
                  ->get();

    //var_dump($queryJogos);
    return view('grid.gridJogos', ['gridJogos' => $queryJogos]);
  }

}
