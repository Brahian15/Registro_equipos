<form action="?c=admin&a=CreateEqui" method="post">
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

    <h3>Registro de equipos</h3>

    <div class="input-field col s4 offset-s2">
      <input type="text" name="data[]" class="validate" required>
      <label>Serial</label>
    </div>

    <div class="input-field col s4">
      <select name="data[]">
        <option disabled selected>Seleccione el tipo</option>
        <?php $this->load->LoadTipo(); ?>
      </select>
      <label>Tipo</label>
    </div>

    <div class="input-field col s4 offset-s2">
      <select name="data[]">
        <option disabled selected>Seleccione la marca</option>
        <?php $this->load->LoadMarca(); ?>
      </select>
      <label>Marca</label>
    </div>

    <div class="input-field col s4">
      <input type="text" name="data[]" class="validate" required>
      <label>Modelo</label>
    </div>

    <div class="input-field col s4 offset-s2">
      <input type="text" name="data[]" class="validate" required>
      <label>Memoria</label>
    </div>

    <div class="input-field col s4">
      <input type="text" name="data[]" class="validate" required>
      <label>Disco duro</label>
    </div>

    <div class="input-field col s4 offset-s2">
      <input type="text" name="data[]" class="validate" required>
      <label>Procesador</label>
    </div>

    <div class="input-field col s4">
      <input type="text" name="data[]" class="validate" required>
      <label>Sistema operativo</label>
    </div>

    <div class="input-field col s4 offset-s2">
      <input type="text" name="data[]" class="validate" required>
      <label>Type</label>
    </div>

    <div class="input-field col s4">
      <input type="text" name="data[]" class="validate" required>
      <label>Consecutivo inventario</label>
    </div>

    <div class="input-field col s4 offset-s2">
      <input type="text" name="data[]" class="validate" required>
      <label>Hostname</label>
    </div>

    <div class="input-field col s4">
      <input type="text" name="data[]" class="validate">
      <label>Elementos adicionales</label>
    </div>

    <button id="btn" class="btn input-field col s4 offset-s2 blue darken-3">Guardar</button>
    <a href="Ver-usuarios" class="btn input-field col s4 blue-grey darken-2">Cancelar</a>

  </div>
</form>
