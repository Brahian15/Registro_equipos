
    <div id="devolucion">
      <div class="container">
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
          <?php $fecha= date("Y-m-d"); ?>
          <form action="?c=admin&a=CreateDev" method="post">

            <h3 class="input-field col s8 offset-s2">Devolución de portatiles</h3>

            <?php foreach($result as $data){ ?>

            <div class="input-field col s4 offset-s2">
              <input type="date" name="data[]" required value="<?php echo $fecha; ?>" class="tooltiped" data-position="bottom" data-tooltip="Fecha de devolución">
            </div>

            <div class="input-field col s4">
              <input type="date" name="data[]" value="<?php echo $data->fec_asig; ?>" class="tooltiped" data-position="bottom" data-tooltip="Fecha de asignación">
            </div>

            <!-- <div class="input-field col s4 offset-s2">
              <input type="text" name="data[]" value="<?php echo $data->tipo_asig; ?>">
              <label>Tipo</label>
            </div> -->

            <div class="input-field col s8 offset-s2">
              <input type="text" name="data[]" value="<?php echo $data->ser; ?>">
              <label>Serial</label>
            </div>

            <div class="input-field col s4 offset-s2">
              <input type="text" name="data[]" value="<?php echo $data->ced; ?>">
              <label>DUI</label>
            </div>

            <div class="input-field col s4">
              <input type="text" name="data[]" value="<?php echo $data->no_asig; ?>">
              <label>Número de asignación</label>
            </div>

          <?php } ?>

            <button id="btn" class="btn input-field col s4 offset-s2 blue darken-3">Devolver</button>

          </form>

          <a href="?c=admin&a=ReadAsig" class="btn input-field col s4 blue-grey darken-2">Cancelar</a>

        </div>
      </div>
    </div>
