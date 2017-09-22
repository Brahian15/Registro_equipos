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

  <form action="?c=admin&a=UpdateUser" method="post">

    <h3>Modificar usuario</h3>

    <?php foreach($result as $data){ ?>

    <div class="input-field col s8 offset-s2">
      <input type="text" name="data[]" value="<?php echo $data->ced; ?>">
      <label>DUI</label>
    </div>

    <div class="input-field col s4 offset-s2">
      <input type="text" name="data[]" value="<?php echo $data->vhur; ?>" required>
      <label>VHUR</label>
    </div>

    <div class="input-field col s4">
      <input type="text" name="data[]" value="<?php echo $data->nom; ?>" required>
      <label>Nombre completo</label>
    </div>

    <div class="input-field col s4 offset-s2" required>
      <input type="text" name="data[]" value="<?php echo $data->tel; ?>" required>
      <label>Teléfono</label>
    </div>

    <div class="input-field col s4">
      <select name="data[]" required>
        <option disabled selected>Seleccione el site</option>
        <?php $this->load->LoadSite();?>
      </select>
    </div>

    <div class="input-field col s4 offset-s2">
      <select name="data[]" required>
        <option disabled selected>Seleccione el area</option>
        <?php $this->load->LoadArea(); ?>
      </select>
    </div>

    <div class="input-field col s4">
      <select name="data[]" required>
        <option disabled selected>Seleccion el cargo</option>
        <?php $this->load->LoadCargo(); ?>
      </select>
    </div>

    <button class="btn input-field col s4 offset-s2 blue darken-3" id="btn">Actualizar</button>

  <?php } ?>

  </form>

    <a href="?c=admin&a=index" class="btn input-field col s4 blue-grey darken-2">Cancelar</a>

</div>
