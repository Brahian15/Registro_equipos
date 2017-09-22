<div class="row z-depth-4" id="filas">

  <nav>
    <ul id="dropdown1" class="dropdown-content">
      <li><a href="?c=admin&a=index">Usuario</a></li>
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
        <li><a class="dropdown-button" data-activates="dropdown2">Admin listas<i class="material-icons right">arrow_drop_down</i></a></li>
      </ul>
    </div>
  </nav>

  <form action="?c=admin&a=UpdateEqui" method="post">

  <h3>Detalle del equipo</h3>

  <?php foreach($result as $data){ ?>

  <div class="input-field col s4 offset-s2">
    <input type="text" name="data[]" value="<?php echo $data->ser; ?>">
    <label>Serial</label>
  </div>

  <div class="input-field col s4">
    <input type="text" name="data[]" value="<?php echo $data->nom_tipo; ?>">
    <label>Elige el tipo</label>
  </div>

  <div class="input-field col s4 offset-s2">
    <input type="text" name="data[]" value="<?php echo $data->nom_marca; ?>">
    <label>Marca</label>
  </div>

  <div class="input-field col s4">
    <input type="text" name="data[]" value="<?php echo $data->model; ?>">
    <label>Modelo</label>
  </div>

  <div class="input-field col s4 offset-s2">
    <input type="text" name="data[]" value="<?php echo $data->memo?>">
    <label>Memoria</label>
  </div>

  <div class="input-field col s4">
    <input type="text" name="data[]" value="<?php echo $data->disc_duro; ?>">
    <label>Disco duro</label>
  </div>

  <div class="input-field col s4 offset-s2">
    <input type="text" name="data[]" value="<?php echo $data->procesador; ?>">
    <label>Procesador</label>
  </div>

  <div class="input-field col s4">
    <input type="text" name="data[]" value="<?php echo $data->sis_operativo; ?>">
    <label>Sistema operativo</label>
  </div>

  <div class="input-field col s4 offset-s2">
    <input type="text" name="data[]" value="<?php echo $data->type; ?>">
    <label>Type</label>
  </div>

  <div class="input-field col s4">
    <input type="text" name="data[]" value="<?php echo $data->cons_inventario; ?>">
    <label>Consecutivo inventario</label>
  </div>

  <div class="input-field col s4 offset-s2">
    <input type="text" name="data[]" value="<?php echo $data->hostname; ?>">
    <label>Hostname</label>
  </div>

  <div class="input-field col s4">
    <input type="text" name="data[]" value="<?php echo $data->adicional; ?>">
    <label>Elementos adicionales</label>
  </div>

  <button id="btn" class="btn input-field col s4 offset-s2 blue darken-3">Actualizar</button>

<?php } ?>

  </form>

  <a href="?c=admin&a=ReadEqui" class="btn input-field col s4 blue-grey darken-2">Cancelar</a>

</div>
