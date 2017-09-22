<div class="row" id="pg-inicio">
  <div id="" class="z-depth-4 center col m4 offset-m4">
      <form id="frmLogin" method="post" data-parsley-validate>
        <h3 class="center-align">INICIAR SESION</h3>
        <div class="input-field col s12">
          <input  id="txtemail" type="email" class="validate" name="data[]" required="required">
          <label for="txtemail">Correo Electronico</label>
         </div>

        <div class="input-field col s12">
          <input  id="txtpass" type="password" class="validate" name="data[]" required="required">
          <label for="txtpass">Contraseña</label>
        </div>

        <div class="col s6">
          <button type="submit" class="btn waves-effect waves-light blue darken-3" style="width:100%; margin-top:20px" id="btnLogin">INICIAR SESION</button>
        </div>
      </form>
    <div class="center"><a href="Registro" id="btn" class="btn blue-grey darken-2 col s5">Registrar Usuario</a></div>
  </div>
</div>
