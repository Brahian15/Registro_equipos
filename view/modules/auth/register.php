<div class="row" id="pg-registro">
  <h3 class="center-align">REGISTRAR USUARIO</h3>
  <div class="col m4 offset-m4 blue-grey lighten-5">
    <div class="row">
      <form action="?c=admin&a=CreateUserLog" id="frmLogin" method="post" data-parsley-validate>
        <div class="input-field col s12">
          <input  id="namereg" type="text" class="validate" name="data[]" required="required">
          <label for="namereg">Nombre</label>
         </div>

         <div class="input-field col s12">
           <input  id="lastNamereg" type="text" class="validate" name="data[]" required="required">
           <label for="lastNamereg">Apellido</label>
          </div>

        <div class="input-field col s12">
          <input  id="emailreg" type="email" class="validate" name="data[]" required="required">
          <label for="emailreg">Correo Electronico</label>
         </div>

        <div class="input-field col s12">
          <input  id="passreg" type="password" class="validate" name="data[]" required="required">
          <label for="passreg">Contraseña</label>
        </div>

        <div class="col s12">
          <button type="submit" class="btn cyan waves-effect waves-light" style="width:100%; margin-top:20px" id="btnReg">GUARDAR USUARIO</button>
        </div>
      </form>
    </div>
  </div>

</div>
