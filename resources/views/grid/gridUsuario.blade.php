@extends('layouts.app')

@section('content')
  @if (isset($_GET['msg']) and $_GET['msg'] == 'okupdate' )
    <div class="alert alert-success"> Dados de usuário  atualizados com sucesso! </div>
  @endif
  <table id="gridView" class="table table-bordered table-hover">
    <thead>
      <th>
        Nome
      </th>
      <th>

      </th>
      <th width='10%'>
        editar
      </th>
      <th width='10%'>
        Excluir
      </th>
    </thead>
    <tbody>
      @foreach ( $gridUsers as $listaUsers )
        <tr>
          <td>
            {{ $listaUsers->name }}
          </td>
          <td>

          </td>
          <td align="center">
            <a href="formuser/{{ $listaUsers->id }}" class="btn btn-info" title="Editar"> <i class="fa fa-pencil" aria-hidden="true"></i> </button>
          </td>
          <td align="center">
            <button type="button" name="button" class="btn btn-danger"> <i class="fa fa-trash" aria-hidden="true"></i> </button>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
