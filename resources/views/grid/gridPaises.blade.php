@extends('layouts.app')

@section('content')
  @if (isset($_GET['msg']) and $_GET['msg'] == "exc")
    <div class="alert alert-danger">
      Pais excluido com sucesso.
    </div>
  @endif
  <table id="gridView" class="table table-bordered table-hover">
    <thead>
      <th>
        Nome
      </th>
      <th>
        Chave
      </th>
      <th width='10%'>
        editar
      </th>
      <th width='10%'>
        Excluir
      </th>
    </thead>
    <tbody>
      @foreach ( $listaPaises as $listaPais )
        <tr>
          <td>
            {{ $listaPais->nome }}
          </td>
          <td>
            {{ $listaPais->chave }}
          </td>
          <td align="center">
            <a href='listaPaises/{{$listaPais->idpais}}' class="btn btn-info" title="Editar"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>
          </td>
          <td align="center">
            <a href="excluir/{{$listaPais->idpais}}" class="btn btn-danger"> <i class="fa fa-trash" aria-hidden="true"></i> </a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
