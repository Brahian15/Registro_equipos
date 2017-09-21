<div class="row" id="pg-registro">
  <h3 class="center-align">REGISTRAR USUARIO</h3>
  <div class="col m4 offset-m4 blue-grey lighten-5">
    <div class="row">
      <form action="?c=admin&a=CreateUserLog" id="frmLogin" method="post" data-parsley-validate>
        <div class="input-field col s12">
          <input  id="txtname" type="text" class="validate" name="data[]" required="required">
          <label for="txtname">Nombre</label>
         </div>

         <div class="input-field col s12">
           <input  id="txtlastName" type="text" class="validate" name="data[]" required="required">
           <label for="txtlastName">Apellido</label>
          </div>

        <div class="input-field col s12">
          <input  id="txtemail" type="email" class="validate" name="data[]" required="required">
          <label for="txtemail">Correo Electronico</label>
         </div>

        <div class="input-field col s12">
          <input  id="txtpass" type="password" class="validate" name="data[]" required="required">
          <label for="txtpass">Contraseña</label>
        </div>

        <div class="col s12">
          <button type="submit" class="btn cyan waves-effect waves-light" style="width:100%; margin-top:20px" id="btnRegistro">GUARDAR USUARIO</button>
        </div>
      </form>
    </div>
  </div>

</div>
