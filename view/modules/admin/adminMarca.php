<div class="row z-depth-4" id="filas">

  <nav>
    <ul id="dropdown1" class="dropdown-content">
      <li><a href="?c=admin&a=ReadUser">Usuario</a></li>
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
        <li><a class="dropdown-button" data-activates="dropdown1">Buscar<i class="material-icons right">arrow_drop_down</i></a></li>
        <li><a href="?c=admin&a=User">Usuario</a></li>
        <li><a href="?c=admin&a=Equipo">Equipo</a></li>
        <li><a href="?c=admin&a=Asignacion">Asignación</a></li>
        <li class="active"><a class="dropdown-button" data-activates="dropdown2">Admin listas<i class="material-icons right">arrow_drop_down</i></a></li>
      </ul>
    </div>
  </nav>

  <h3>Sección de marca del equipo</h3>

  <form action="?c=admin&a=CreateMarca" method="post">
    <div class="input-field col s8 offset-s2">
      <input type="text" name="data[]">
      <label>Nueva Marca</label>
    </div>

    <button id="btn" class="btn col s4 offset-s2 blue darken-3">Guardar</button>
  </form>

  <a href="index.php" class="btn col s4 blue-grey darken-2">Cancelar</a>

  <?php foreach($result as $data){ ?>

    <div class="input-field col s8 offset-s2">
      <input type="text" name="data[]" value="<?php echo $data->nom_marca; ?>">
      <label>Nombre de la marca</label>
    </div>

    <a onclick="return confirm('¿Desea eliminar la marca permanentemente?')" id="btn" href="?id=<?php echo $data->no_marca; ?>&c=admin&a=DeleteMarca" class="btn col s8 offset-s2 blue-grey darken-2 tooltiped" data-position="right" data-tooltip="Eliminar"><i class="small material-icons">delete</i></a>

  <?php } ?>

</div>
