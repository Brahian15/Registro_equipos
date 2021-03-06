<div class="row z-depth-4" id="filas">

  <nav>
    <ul id="dropdown1" class="dropdown-content">
      <li class="active"><a href="?c=admin&a=ReadUser">Usuario</a></li>
      <li class="divider"></li>
      <li><a href="?c=admin&a=ReadEqui">Equipo</a></li>
      <li class="divider"></li>
      <li><a href="?c=admin&a=ReadAsig">Asignación</a></li>
      <li class="divider"></li>
      <li><a href="?c=admin&a=ReadHis">Historial</a></li>
    </ul>
    <ul id="dropdown2" class="dropdown-content">
      <li><a href="?c=admin&a=AdminSite">Site</a></li>
      <li class="divider"></li>
      <li><a href="?c=admin&a=AdminArea">Area</a></li>
      <li class="divider"></li>
      <li><a href="?c=admin&a=AdminCargo">Cargo</a></li>
      <li class="divider"></li>
      <li><a href="?c=admin&a=AdminTipo">Tipo</a></li>
      <li class="divider"></li>
      <li><a href="?c=admin&a=AdminMarca">Marca</a></li>
    </ul>
    <div class="nav-wrapper blue darken-3">
      <a class="brand-logo right"><img src="../../../../S.R.P.C/view/assets/imagenes/Logo.png" alt="Logo Onelink"></a>
      <ul id="nav-mobile">
        <li class="active"><a class="dropdown-button" data-activates="dropdown1">Buscar<i class="material-icons right">arrow_drop_down</i></a></li>
        <li><a href="?c=admin&a=User">Usuario</a></li>
        <li><a href="?c=admin&a=Equipo">Equipo</a></li>
        <li><a href="?c=admin&a=Asignacion">Asignación</a></li>
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
      <input type="text" name="data[]" value="<?php echo $data->vhur; ?>" required="required">
      <label>VHUR</label>
    </div>

    <div class="input-field col s4">
      <input type="text" name="data[]" value="<?php echo $data->nom; ?>" required="required">
      <label>Nombre completo</label>
    </div>

    <div class="input-field col s4 offset-s2">
      <input type="text" name="data[]" value="<?php echo $data->tel; ?>" required="required">
      <label>Teléfono</label>
    </div>

    <div class="input-field col s4">
      <input type="text" name="data[]" value="<?php echo $data->nom_site;?>" required="required">
      <label>Site</label>
    </div>

    <div class="input-field col s4 offset-s2">
      <input type="text" name="data[]" value="<?php echo $data->nom_area; ?>" required="required">
      <label>Area</label>
    </div>

    <div class="input-field col s4">
      <input type="text" name="data[]" value="<?php echo $data->nom_cargo; ?>" required="required">
      <label>Cargo</label>
    </div>

    <button class="btn input-field col s4 offset-s2 blue darken-3" id="btn">Actualizar</button>

  <?php } ?>

  </form>

    <a href="?c=admin&a=readUser" class="btn input-field col s4 blue-grey darken-2">Cancelar</a>

</div>
