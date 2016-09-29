@extends('layouts.app')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"> Adicionar Jogo </h3>
    </div>
    <div class="panel-body">
      <form class="" action="index.html" method="post">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="titulo"> Titulo do Jogo </label>
              <input type="text" class="form-control" id="" placeholder="">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Link do jogo</label>
              <input type="text" name="link" class="form-control" id="" placeholder="">
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="">Sobre o Jogo</label>
          <textarea name="sobreJogo" rows="8" cols="40"></textarea>
        </div>

        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <button type="button" name="button" class="btn btn-primary btn-block"> Salvar </button>
          </div>
        </div>

      </form>
    </div>
  </div>

@endsection
