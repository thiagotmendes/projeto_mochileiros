@extends('layouts.sistema')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Olá Pequeno mochileiro!</div>

        <div class="panel-body">
          @php
            $teste = Auth::user()->tipoUsuario;
          @endphp
          @if ($teste == 0)
            Esta é a área do mochileiro.
          @else
            teste
          @endif
        </div>
    </div>
@endsection
