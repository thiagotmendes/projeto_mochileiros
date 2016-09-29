@extends('layout.app')

@section('title', 'Registro de Usuários')
@section('content')
  <form class="" action="index.html" method="post">
    <div class="form-group">
      <label for=""> Nome </label>
      <input type="text" name="nome" class="form-control" id="" placeholder="">
    </div>
    <div class="form-group">
      <label for=""> Email </label>
      <input type="text" name="email" class="form-control" id="" placeholder="">
    </div>
    <div class="form-group">
      <label for=""> Senha </label>
      <input type="password" name="password" class="form-control" id="" placeholder="">
    </div>
    <button type="submit" name="button" class="btn btn-primary"> Cadastrar </button>
  </form>
@endsection
