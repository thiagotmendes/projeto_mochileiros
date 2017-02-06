@if (Auth::guest())
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"> Pequenos Mochileiros </h3>
    </div>
    <div class="panel-body">
      <ul>
        <li> <a href="http://pequenosmochileiros.fourmedia.com.br/o-mochileiro"> O Mochileiro </a> </li>
        <li> <a href="http://pequenosmochileiros.fourmedia.com.br/trocas-e-devolucoes"> Trocas e Devoluções </a> </li>
        <li> <a href="http://pequenosmochileiros.fourmedia.com.br/politica-de-privacidade"> Política de privacidade </a> </li>
        <li> <a href="http://pequenosmochileiros.fourmedia.com.br/blog"> Blog </a> </li>
        <li> <a href="http://pequenosmochileiros.fourmedia.com.br/contato"> Contato </a> </li>
      </ul>
    </div>
  </div>
@else
  @if ($teste == 0)
    @include('include.menuJogos')
    @include('include.menuUsuario')
  @else
    <div class="lista-paises">
      <h2> Paises </h2>
      <ul>
        @if (isset($listaPais))
          @foreach ($listaPais as $pais)
            @if (isset($id) and $id == $pais->idpais)
              @php
                $active = "active";
              @endphp
            @else
              @php
                $active = "";
              @endphp
            @endif
            <li class="@php echo $active @endphp">
              <a href="{{url('home/'.$pais->idpais."/".$pais->nome)}}"> {{ $pais->nome }} </a>
            </li>
          @endforeach
        @endif
      </ul>
    </div>
  @endif
@endif
