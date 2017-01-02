@extends('layouts.app')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Adicionar Pais</h3>
    </div>
    <div class="panel-body">
      @if (isset($_GET['msg']) and $_GET['msg'] == "ok")
        <div class="alert alert-success">
          Pais adicionado com sucesso!
        </div>
      @elseif (isset($_GET['msg']) and $_GET['msg'] == "update_ok")
        <div class="alert alert-success">
          Dados atualizados com sucesso!
        </div>
      @endif
      <form class="" action="{{url('/addpais/adicionar')}}" method="post">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="nomePais">Pais</label>
              <input type="text" name="pais" class="form-control" id="" placeholder=""
              value="@if(isset($idpais)) {{$idpais[0]->nome}} @endif">
              @if(isset($idpais))
                <input type="hidden" name="idpais" value="@if(isset($idpais)){{$idpais[0]->idpais}}@endif">
              @endif
              {{ csrf_field() }}
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="chave">Chave</label>
              <input type="text" name="chave" class="form-control" id="" placeholder=""
              value="@if(isset($idpais)){{$idpais[0]->chave}}@endif"
                @if(isset($idpais)) disabled @endif />
            </div>
          </div>

        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
            <textarea name="descricao" rows="8" cols="40" class="form-control">@if(isset($idpais)) {{$idpais[0]->descricao}} @endif</textarea>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <button type="submit" name="button" class="btn btn-primary btn-block"> SALVAR </button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
