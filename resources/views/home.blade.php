@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Olá Pequeno mochileiro!</div>

        <div class="panel-body">
          @php
            $teste = Auth::user()->tipoUsuario;
          @endphp
          @if (Auth::user()->tipoUsuario == 0)
            Esta é a área do mochileiro.
          @else
            @if (isset($listaJogosHome))
              <div class="row">
                @foreach ($listaJogosHome as $jogosDes )
                  <div class="col-md-3">
                    <a href="/executajogo/{{$jogosDes->idjogos}}">
                      <img src="{{$jogosDes->imgJogo}}" alt="" class="img-responsive" />
                    </a>
                  </div>
                @endforeach
              </div>
            @else
              @include('form.formChave')
            @endif
          @endif
        </div>
    </div>
@endsection
