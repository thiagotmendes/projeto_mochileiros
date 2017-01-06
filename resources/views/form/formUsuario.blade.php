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
      @if (isset($_GET['msg']) and $_GET['msg'] == 'okupdate' )
        <div class="alert alert-success"> Dados de usuário   atualizados com sucesso! </div>
      @endif
      @if (isset($_GET['msg']) and $_GET['msg'] == 'error_email' )
        <div class="alert alert-danger">
          Erro ao cadastrar email! <strong>Email já existe</strong>
       </div>
      @endif
      <form class="" action="{{url('/addUser/adicionar')}}" method="post">
        <div class="row">
          <div class="col-md-5">
            <div class="form-group">
              <label for="nome">Nome</label>
              <input type="text" name="nome" class="form-control" id="" placeholder=""
              value="@if(isset($formUpdate[0]) and $formUpdate[0]){{ $formUpdate[0]->name }}@endif">
              <input type="hidden" name="idusuario"
              value="@if(isset($formUpdate[0]) and $formUpdate[0]){{$formUpdate[0]->id}}@endif">
              {{ csrf_field() }}
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" name="email" class="form-control" id="" placeholder=""
              value="@if(isset($formUpdate[0]) and $formUpdate[0]){{ $formUpdate[0]->email }}@endif">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              @if (!isset($formUpdate[0]->id))
                <label for="telefone">Senha</label>
                <input type="password" name="password" class="form-control" id="" placeholder=""
                value="@if(isset($formUpdate[0]) and $formUpdate[0]){{$formUpdate[0]->password}}@endif">
              @else
                  <div class="alert alert-info">
                    <small>A senha so pode ser alterada pelo próprio usuário.</small>
                  </div>
              @endif
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
