@extends('layouts.app')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"> Adicionar Usuário </h3>
    </div>
    <div class="panel-body">
      @if (isset($_GET['msg']) and $_GET['msg'] == "ok")
        <div class="alert alert-success">
          Usuário adicionado com sucesso!
        </div>
      @endif
      <form class="" action="adicionar" method="post">
        <div class="row">
          <div class="col-md-5">
            <div class="form-group">
              <label for="nome">Nome</label>
              <input type="text" name="nome" class="form-control" id="" placeholder="">
              {{ csrf_field() }}
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" name="email" class="form-control" id="" placeholder="">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="telefone">Senha</label>
              <input type="password" name="password" class="form-control" id="" placeholder="">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <button type="submit" name="button" class="btn btn-block btn-primary"> SALVAR </button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
