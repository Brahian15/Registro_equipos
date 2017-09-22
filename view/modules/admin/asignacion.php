<div class="row z-depth-4" id="filas">

  <nav>
    <ul id="dropdown1" class="dropdown-content">
      <li><a href="Ver-usuarios">Usuario</a></li>
      <li class="divider"></li>
      <li><a href="Ver-equipos">Equipo</a></li>
      <li class="divider"></li>
      <li><a href="Ver-asignaciones">Asignación</a></li>
      <li class="divider"></li>
      <li><a href="Ver-historial">Historial</a></li>
    </ul>
    <ul id="dropdown2" class="dropdown-content">
      <li><a href="admin-site">Site</a></li>
      <li class="divider"></li>
      <li><a href="admin-area">Area</a></li>
      <li class="divider"></li>
      <li><a href="admin-cargo">Cargo</a></li>
      <li class="divider"></li>
      <li><a href="admin-tipo">Tipo</a></li>
      <li class="divider"></li>
      <li><a href="admin-marca">Marca</a></li>
    </ul>
    <div class="nav-wrapper blue darken-3">
      <a class="brand-logo right"><img src="../../../../S.R.P.C/view/assets/imagenes/Logo.png" alt="Logo Onelink"></a>
      <ul id="nav-mobile">
        <li><a class="dropdown-button" data-activates="dropdown1">Buscar<i class="material-icons right">arrow_drop_down</i></a></li>
        <li><a href="Usuario">Usuario</a></li>
        <li><a href="Equipo">Equipo</a></li>
        <li><a href="Asignacion">Asignación</a></li>
        <li><a class="dropdown-button" data-activates="dropdown2">Admin listas<i class="material-icons right">arrow_drop_down</i></a></li>
        <li><a href="index.php?c=admin&a=logout">Cerrar Sesión</a></li>
      </ul>
    </div>
  </nav>
  <?php $fecha= date("Y-m-d"); ?>
<form action="?c=admin&a=CreateAsig" method="post">

  <h3 class="input-field col s8 offset-s2">Asignación de equipo</h3>

  <div class="input-field col s8 offset-s2">
    <input type="date" name="data[]" required value="<?php echo $fecha; ?>" class="tooltiped" data-position="bottom" data-tooltip="Fecha de asignación">
  </div>

  <!-- <div class="input-field col s4">
    <select name="data[]">
      <option disabled selected> Seleccione el tipo</option>
      <?php $this->load->LoadTipo(); ?>
    </select>
    <label>Tipo</label>
  </div> -->

  <div class="input-field col s4 offset-s2">
    <input type="text" name="data[]" class="validate" required>
    <label>Serial</label>
  </div>

  <div class="input-field col s4">
    <input type="text" name="data[]" class="validate" required>
    <label>DUI</label>
  </div>

  <button id="btn" href="" class="waves-effect waves-light btn input-field col s4 offset-s2 card-panel blue darken-3">Guardar</button>

</form>

  <a href="Ver-usuarios" class="waves-effect waves-light btn input-field col s4 card-panel blue-grey darken-2">Cancelar</a>

</div>
