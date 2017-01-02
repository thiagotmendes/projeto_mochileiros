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

  // FAZ O SELECT DE PAISES
  public function index()
  {
    $queryPais = DB::table('pais')->get();
    return view('form.formAdicionaJogo', [ 'buscaPais' => $queryPais ] );
  }

  public function createJogos(Request $addJogos)
  {
    $idJogoUpdate = $addJogos->idjogo;
    $nome = $addJogos->nome;
    $link = $addJogos->link;
    $paisjogo = $addJogos->paisjogo;
    $sobreJogo = $addJogos->sobreJogo;

    //  VERIFICA SE EXISTE ARQUIVO
    if(!empty(Input::file('imgJogo'))):
      // cria o caminho para o upload do arquivo
      $destinationPath = public_path() . '/arquivos/';
      // captura a extensão do arquivo
      $extension = Input::file('imgJogo')->getClientOriginalExtension();
      // cria um nome para o arquivo
      $filename = 'arq-'. $nome."-". rand(1111,9999) .".". $extension;
      $extencao = array('jpg','png');
      //VERIFICA A EXTENSÃO DO ARQIVO
      if(in_array($extension,$extencao)){
        // realiza o upload do arquivo
        Input::file('imgJogo')->move($destinationPath, $filename);
      }  else {
        return redirect('addjogo/?msg=erro');
      }
    endif;

    if ($addJogos->_token) {
      // VERIFICA SE É UMA ATUALIZAÇÃO
      if(empty($idJogoUpdate)):
        // VERIFICA SE EXISTE ALGUMA IMAGEM EM ANEXO
        if(!empty($filename)):
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
        else:
          // SE NÃO EXISTEM IMAGEM INSERE O JOGO SEM CAPA
          DB::table('jogos')->insert(
            [
              'nome'        => $nome,
              'idpais'      => $paisjogo,
              'link'        => $link,
              'descricao'   => $sobreJogo,
              'created_at'  =>  DB::raw('now()')
            ]
          );
        endif;
        return redirect('addjogo/listaJogos/?msg=ok');
      else:
        if(!empty($filename)):
          // ATUALIZ O JOGO COMPLETO
          DB::table('jogos')
          ->where('idjogos', $idJogoUpdate)
          ->update(
            [
              'nome'        => $nome,
              'idpais'      => $paisjogo,
              'link'        => $link,
              'descricao'   => $sobreJogo,
              'imgJogo'     => "/arquivos/".$filename,
              'updated_at'  =>  DB::raw('now()')
            ]
          );
        else:
          // ATUALIZA O JOGO SEM A CAPA
          DB::table('jogos')
          ->where('idjogos', $idJogoUpdate)
          ->update(
            [
              'nome'        => $nome,
              'idpais'      => $paisjogo,
              'link'        => $link,
              'descricao'   => $sobreJogo,
              'updated_at'  =>  DB::raw('now()')
            ]
          );
        endif;
        return redirect('addjogo/listaJogos/'.$idJogoUpdate.'?msg=update_ok');
      endif;
    }
  }

  public function viewJogos()
  {
    /*$queryJogos = DB::table('jogos')
                  ->select('jogos.nome as nomeJogo','jogos.idjogos as idjogo')
                  ->get();*/

    $queryJogos = DB::table('jogos')
                  ->join('pais', 'jogos.idpais', '=', 'pais.idpais')
                  ->select('jogos.nome as nomeJogo', 'pais.nome as nomePais','jogos.idjogos as idjogo')
                  ->get();
    //var_dump($queryJogos);
    return view('grid.gridJogos', ['gridJogos' => $queryJogos]);
  }

  public function formEditaJogo($idJogo)
  {
    $queryJogosUpdate = DB::table('jogos')
                        ->where('idjogos', '=' , $idJogo)
                        ->get();
    $queryPais = DB::table('pais')->get();

    return view('form.formAdicionaJogo',['buscaJogos' => $queryJogosUpdate, 'buscaPais' => $queryPais]);
  }

  public function excluirJogo($idJogoExclusao)
  {
    DB::table('jogos')->where('idjogos', '=', $idJogoExclusao)->delete();
    return redirect('addjogo/listaJogos?msg=exc');
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
