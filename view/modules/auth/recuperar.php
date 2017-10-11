<div class="row" id="pg-inicio">
  <div id="recover" class="z-depth-4 center col m4 offset-m4">
      <form action="?c=admin&a=Password" method="post" data-parsley-validate>
        <div class="card-panel blue darken-3">
          <h3 class="center-align">RECORDAR CONTRASEÑA</h3>
        </div>
        <div class="input-field col s12">
          <input type="email" class="validate" name="data" required="required" autofocus>
          <label>Correo Electronico</label>
        </div>

        <button type="submit" class="btn waves-effect waves-light blue darken-3 col s6">Enviar</button>

      </form>

      <a id="btnCanc" href="index.php?c=auth&a=login" class="btn waves-effect waves-light blue-grey darken-2 col s5 offset-s1">Cancelar</a>

  </div>
</div>
