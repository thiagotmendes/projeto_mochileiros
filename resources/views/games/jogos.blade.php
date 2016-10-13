@extends('layouts.sistema')
@section('content')
  @foreach ($idLinkJogo as $linkJogo)
    <iframe src="{{$linkJogo->link}}" width="100%" height="600"></iframe>
  @endforeach
@endsection
