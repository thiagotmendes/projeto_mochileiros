                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         @extends('layouts.app')

@section('content')
  @if (isset($_GET['msg']) and $_GET['msg'] == 'ok')
    <div class="alert alert-success"> Jogo cadastrado com sucesso! </div>
  @endif
  @if (isset($_GET['msg']) and $_GET['msg'] == 'exc')
    <div class="alert alert-danger"> Jogo Excluido com sucesso! </div>
  @endif
  <table id="gridView" class="table table-bordered table-hover">
    <thead>
      <th>
        Titulo
      </th>
      <th>
        Pais
      </th>
      <th width='10%'>
        editar
      </th>
      <th width='10%'>
        Excluir
      </th>
    </thead>
    <tbody>
      @foreach ( $gridJogos as $listaJogos )
        <tr>
          <td>
            {{ $listaJogos->nomeJogo }}
          </td>
          <td>
            {{ $listaJogos->nomePais }}
          </td>
          <td align="center">
            <a href="{{url('addjogo/listaJogos/'.$listaJogos->idjogo)}}" class="btn btn-info" title="Editar"> <i class="fa fa-pencil" aria-hidden="true"></i> </button>
          </td>
          <td align="center">
            <a href="javascript:func()" onclick="confirmaDel({{$listaJogos->idjogo}})"
              class="btn btn-danger"> <i class="fa fa-trash" aria-hidden="true"></i> </a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection

<script type="text/javascript">
  function confirmaDel(id) {
    var confirma = confirm("Deseja remover esse Jogo?");
    if (confirma == true) {
      window.location.href = "{{url('addjogo/excluir')}}/"+id;
    }
  }
</script>
