@extends('layouts.app')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"> Adicionar Jogo </h3>
    </div>
    <div class="panel-body">
      <form class="" action="/addjogo/adicionar" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="titulo"> Titulo do Jogo </label>
              <input type="text" name="nome" class="form-control" id="" placeholder="">
              {{ csrf_field() }}
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Link do jogo</label>
              <input type="text" name="link" class="form-control" id="" placeholder="">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Pais</label>
              <select class="form-control" name="paisjogo">
                <option value=""></option>
                @foreach ( $buscaPais as $pais )
                  <option value="{{ $pais->idpais }}"> {{ $pais->nome }} </option>
                @endforeach
              </select>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Imagem</label>
              <input type="file" name="imgJogo" id="" placeholder="">
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="">Sobre o Jogo</label>
          <textarea name="sobreJogo" rows="8" cols="40"></textarea>
        </div>

        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <button type="submit" name="button" class="btn btn-primary btn-block"> Salvar </button>
          </div>
        </div>

      </form>
    </div>
  </div>

@endsection
