@extends('layouts.app')

@section('content')

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-9">
          @yield('content')
        </div>
      </div>
    </div>
@endsection
