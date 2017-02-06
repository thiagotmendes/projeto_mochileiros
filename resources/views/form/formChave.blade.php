  @if (isset($_GET['msg']) && $_GET['msg'] == "ok")
    <div class="alert alert-success"> País desbloqueado. </div>
  @elseif (isset($_GET['msg']) && $_GET['msg'] == "erro")
    <div class="alert alert-danger"> Chave inserida não existe! insira a chave corretamente, caso o erro persista entre em contato. </div>
  @endif
  <h2>Olá Pequeno Mochileiro! Vamos desbravar um novo pais?</h2>
  <form class="form-inline" action="{{url('home/addchave')}}" method="post">
    <div class="input-group">
      <input type="text" name="chave" class="form-control" id="" placeholder="Destravar Pais">
      {{ csrf_field() }}
      <input type="hidden" name="iduser" value="{{ Auth::user()->id }}">
      <span class="input-group-btn">
        <button class="btn btn-info" type="submit"> Destravar Pais </button>
      </span>
    </div>
  </form>
