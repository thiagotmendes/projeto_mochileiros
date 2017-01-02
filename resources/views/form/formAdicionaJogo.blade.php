@extends('layouts.app')

@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"> Adicionar Jogo </h3>
    </div>
    <div class="panel-body">
      @if (isset($_GET['msg']) and $_GET['msg'] == 'update_ok')
        <div class="alert alert-success"> Jogo atualizado com sucesso </div>
      @endif
      <form class="" action="{{url('/addjogo/adicionar')}}" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="titulo"> Titulo do Jogo </label>
              <input type="text" name="nome" value="@if(isset($buscaJogos)){{$buscaJogos[0]->nome}}@endif" class="form-control" id="" placeholder="">
              <input type="hidden" name="idjogo" value="@if(isset($buscaJogos)){{$buscaJogos[0]->idjogos}}@endif">
              {{ csrf_field() }}
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">Link do jogo</label>
              <input type="text" name="link" value="@if(isset($buscaJogos)){{$buscaJogos[0]->link}}@endif" class="form-control" id="" placeholder="">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="">País</label>
              <select class="form-control" name="paisjogo">
                <option value=""></option>
                @foreach ( $buscaPais as $pais )
                  @if(isset($buscaJogos) and $buscaJogos[0]->idpais == $pais->idpais)
                    @php
                      $selectPais = "selected"
                    @endphp
                  @else
                    @php
                      $selectPais = ""
                    @endphp
                  @endif
                  <option value="{{ $pais->idpais }}" {{$selectPais}}> {{ $pais->nome }} </option>
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
              @if (isset($buscaJogos))
                <div class="row ">
                  <div class="col-md-4">
                    <br>
                    <img src="{{url($buscaJogos[0]->imgJogo)}}" alt="" class="img-thumbnail img-responsive">
                  </div>
                </div>

              @endif
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="">Sobre o Jogo</label>
          <textarea name="sobreJogo" rows="8" cols="40">@if(!empty($buscaJogos[0]->descricao)){{$buscaJogos[0]->descricao}}@endif</textarea>
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
