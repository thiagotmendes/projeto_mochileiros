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
      @endif
      <form class="" action="/addpais/adicionar" method="post">
        <div class="row">

          <div class="col-md-6">
            <div class="form-group">
              <label for="nomePais">Pais</label>
              <input type="text" name="pais" class="form-control" id="" placeholder="">
              {{ csrf_field() }}
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="chave">Chave</label>
              <input type="text" name="chave" class="form-control" id="" placeholder="">
            </div>
          </div>

        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
            <textarea name="descricao" rows="8" cols="40" class="form-control"></textarea>
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
