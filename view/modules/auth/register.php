<div class="row" id="pg-registro">
  <div id="registro" class="z-depth-4 col m4 offset-m4">
    <div class="card-panel blue darken-3">
      <h3 class="center-align">REGISTRAR USUARIO</h3>
    </div>
      <form action="Guardar" method="post" data-parsley-validate>
        <div class="input-field col s12">
          <input  id="namereg" type="text" class="validate" name="data[]" required="required" autofocus>
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

        <button id="btnReg" class="btn waves-effect waves-light blue darken-3 col s6">Guardar</button>

      </form>

      <a id="btnCanc" href="Inicio" class="btn blue-grey darken-2 col s5 offset-s1">Cancelar</a>

  </div>

</div>
