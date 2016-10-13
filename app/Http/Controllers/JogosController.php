<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Quotation;
use Illuminate\Support\Facades\Input;
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

    // cria o caminho para o upload do arquivo
    $destinationPath = public_path() . '/arquivos/';
    // captura a extensão do arquivo
    $extension = Input::file('imgJogo')->getClientOriginalExtension();
    // cria um nome para o arquivo
    $filename = 'arq-'. $nome."-". rand(1111,9999) .".". $extension;
    $extencao = array('jpg','png');

    if(in_array($extension,$extencao)){
      // realiza o upload do arquivo
      Input::file('imgJogo')->move($destinationPath, $filename);
      if ($addJogos->_token) {
        DB::table('jogos')->insert(
          [
            'nome'        => $nome,
            'idpais'      => $paisjogo,
            'link'        => $link,
            'descricao'   => $sobreJogo,
            'imgJogo'     => "/arquivos/".$filename,
            'created_at'  =>  DB::raw('now()')
          ]
        );
        return redirect('addjogo/?msg=ok');
      } else {
        return redirect('addjogo/?msg=error');
      }
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

  public function ExecutaJogo($idJogos)
  {
    $queryJogos = DB::table('jogos')
                    ->select('link')
                    ->where('idjogos', '=', $idJogos)
                    ->get();
    return view('games.jogos', ['idLinkJogo' => $queryJogos]);
  }

}
