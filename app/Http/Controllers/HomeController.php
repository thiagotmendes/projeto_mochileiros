<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      $idUser = Auth::user()->id;
      $pais = DB::table('usuarios_pais')
              ->join('pais', 'pais.chave', '=', 'usuarios_pais.chave_pais')
              ->where('usuarios_pais.iduser', '=', $idUser)
              ->get();


      return view('home', ['listaPais' => $pais] );
    }

    public function insereChave(Request $addChave)
    {
      $chave     = $addChave->chave;
      $idUser    = $addChave->iduser;
      // BUSCA O PAIS PELA CHAVE
      $pais = DB::table('pais')
              ->where('chave', '=', $chave)
              ->get();

      // VERIFICA SE A CHAVE É VERDADEIRA
      if ($pais) {
        $verificaChave = $pais[0]->chave;
        if ($addChave->_token) {
          if($verificaChave){
            // CASO SEJA VERDADEIRA FAZ A INSERÇÃO E O DESBLOQUEIO DO PAIS
            DB::table('usuarios_pais')->insert(
              [
                'idpais'     => $pais[0]->idpais,
                'iduser'     => $idUser,
                'chave_pais' => $chave,
                'created_at' =>  DB::raw('now()')
              ]
            );
            return redirect('home/?msg=ok');
          } else {
            return redirect('home/?msg=erro1');
          }
        } else {
          return redirect('home/?msg=erro2');
        }
      } else {
        return redirect('home/?msg=erro');
      }
    }

}
