@extends('layouts.app')

@section('content')
  <div class="col-md-6">
    <div class="box-login">
      <h2 class="titulo-login">Já é parte do nosso time?</h2>

      <form class="" role="form" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="email"> Email </label>
          <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
          @if ($errors->has('email'))
              <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group">
          <label for="password"> Senha </label>
          <input id="password" type="password" class="form-control" name="password">
          @if ($errors->has('password'))
              <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
              </span>
          @endif
        </div>
        <div class="row">
          <div class="col-md-6">
            <button type="submit" class="btn btn-login btn-block btn-lg">
                <i class="fa fa-btn fa-sign-in"></i> Login
            </button>
          </div>
          <div class="col-md-6">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember"> Lembrar
                </label>
            </div>
          </div>
        </div>
        <div class="esqueci-senha">
          <a class="" href="{{ url('/password/reset') }}">Esqueci minha senha?</a>
        </div>
      </form>
    </div>
  </div>
  <div class="col-md-6">
    <div class="text-center">
      <img src="{{asset('images/bonecos-login.png')}}" alt="">
    </div>
  </div>
@endsection
