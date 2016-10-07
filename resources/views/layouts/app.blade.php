<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pequenos Mochileiros  @yield('- title') </title>
    @section('style')
      <link rel="stylesheet" href="{{asset('css/estilo.css')}}">
      <!-- Bootstrap -->
      <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
      <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
      <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap.css')}}">
    @show
    @php
      $teste = Auth::user()->tipoUsuario;
    @endphp
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

<body id="app-layout">
    @include('include.menu')

    <div class="container">
      <div class="row">
        <div class="col-md-3">
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
            @endif
          @endif
        </div>
        <div class="col-md-9">
            @yield('content')
        </div>
      </div>
    </div>


    @section('scripts')
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="{{asset('js/jquery-3.1.0.min.js')}}"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="{{asset('js/tinymce/js/tinymce/tinymce.min.js')}}"></script>
      <script src="{{asset('js/bootstrap.js')}}"></script>
      <script src="{{asset('js/jquery.dataTables.js')}}"></script>
      <script src="{{asset('js/dataTables.bootstrap.js')}}"></script>
      <script src="{{asset('js/funcoes.js')}}"></script>
    @show
    </body>
    </html>

</body>
</html>
