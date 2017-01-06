@extends('layouts.app')

@section('content')
  @if (isset($_GET['msg']) and $_GET['msg'] == "exc")
    <div class="alert alert-success">
      Usuário excluido com sucesso
    </div>
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
            @if ($listaUsers->tipoUsuario == 1)
              <a href="formuser/{{ $listaUsers->id }}" class="btn btn-info" title="Editar">
                <i class="fa fa-pencil" aria-hidden="true"></i>
              </button>
            @endif
          </td>
          <td align="center">
            @if ($listaUsers->tipoUsuario == 1)
              <a href="javascript:func()" onclick="confirmaDel({{$listaUsers->id}})"
                class="btn btn-danger"> <i class="fa fa-trash" aria-hidden="true"></i> </a>
            @endif
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection

<script type="text/javascript">
  function confirmaDel(id) {
    var confirma = confirm("Deseja remover esse Usuário?");
    if (confirma == true) {
      window.location.href = "{{url('addUser/excluir')}}/"+id;
    }
  }
</script>
