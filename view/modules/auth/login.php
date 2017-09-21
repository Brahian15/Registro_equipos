<div class="row" id="pg-inicio">

  <h3 class="center-align">INICIAR SESION</h3>
  <div class="col m4 offset-m4 blue-grey lighten-5">
    <div class="row">
      <form id="frmLogin" method="post" data-parsley-validate>
        <p class="col s12">Ingresa el usuario y la contraseña que tiene almacenada</p>
        <div class="input-field col s12">
          <input  id="txtemail" type="email" class="validate" name="data[]" required="required">
          <label for="txtemail">Correo Electronico</label>
         </div>

        <div class="input-field col s12">
          <input  id="txtpass" type="password" class="validate" name="data[]" required="required">
          <label for="txtpass">Contraseña</label>
        </div>

        <div class="col s12">
          <button type="submit" class="btn cyan waves-effect waves-light" style="width:100%; margin-top:20px" id="btnLogin">INICIAR SESION</button>
        </div>
      </form>
    </div>
    <div class="center"><a href="?c=admin&a=registerGuest">Registrar Usuario</a></div>
  </div>

</div>
