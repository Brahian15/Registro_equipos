<div class="row" id="pg-inicio">
  <div id="login" class="z-depth-4 center col m4 offset-m4">
      <form id="frmLogin" method="post" data-parsley-validate>
        <div class="card-panel blue darken-3">
          <h3 class="center-align">INICIAR SESION</h3>
        </div>
        <div class="input-field col s12">
          <input  id="txtemail" type="email" class="validate" name="email" required="required" autofocus>
          <label for="txtemail">Correo Electronico</label>
         </div>

        <div class="input-field col s12">
          <input  id="txtpass" type="password" class="validate" name="pass" required="required">
          <label for="txtpass">Contraseña</label>
        </div>

        <button id="btnLogin" type="submit" class="btn waves-effect waves-light blue darken-3 col s6">Iniciar sesion</button>

      </form>

      <a id="btnRegis" href="Registro" class="btn blue-grey darken-2 col s5 offset-s1">Registrarse</a>

      <a id="btnRecuperar" href="?c=admin&a=Clave" class="btn blue-grey darken-2 col s12">Recuperar contraseña</a>

  </div>
</div>
