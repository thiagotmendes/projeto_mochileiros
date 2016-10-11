  @if (isset($_GET['msg']) && $_GET['msg'] == "ok")
    <div class="alert alert-success"> Pais desbloqueado. </div>
  @elseif (isset($_GET['msg']) && $_GET['msg'] == "erro")
    <div class="alert alert-danger"> Chave inserida não existe! insira a chave corretamente, caso o erro persista entre em contato. </div>
  @endif
  <form class="form-inline" action="/home/addchave" method="post">
    <div class="form-group">
      <label for="chave">Insira a chave</label>
      <input type="text" name="chave" class="form-control" id="" placeholder="">
      {{ csrf_field() }}
      <input type="hidden" name="iduser" value="{{ Auth::user()->id }}">
    </div>
    <button type="submit" name="button" class="btn btn-info"> Destravar Pais </button>
  </form>
