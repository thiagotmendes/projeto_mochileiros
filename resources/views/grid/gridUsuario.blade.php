@extends('layouts.app')

@section('content')
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
            <button type="button" name="button" class="btn btn-info" title="Editar"> <i class="fa fa-pencil" aria-hidden="true"></i> </button>
          </td>
          <td align="center">
            <button type="button" name="button" class="btn btn-danger"> <i class="fa fa-trash" aria-hidden="true"></i> </button>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
