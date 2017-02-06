@extends('layouts.app')

@section('content')
  @if (!isset($listaJogosHome))
    <div class="alert alert-chave">
      @include('form.formChave')
    </div>
  @endif

    @if (!empty($paisurl))
      <div class="alert alert-warning">
        <a href="{{url('home')}}"> Inicio > </a>
        {{ $paisurl }}
      </div>    
    @endif

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
                <img src="{{asset($jogosDes->imgJogo)}}" alt="" class="img-responsive" />
              </a>
            </div>
          @endforeach
        </div>
      @else
        <!--@include('form.formChave')-->
      @endif
    @endif

@endsection
