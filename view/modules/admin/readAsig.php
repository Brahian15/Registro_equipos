<div class="row z-depth-4" id="filas">
  <form action="" method="post">

    <nav>
      <ul id="dropdown1" class="dropdown-content">
        <li><a href="?c=admin&a=ReadUser">Usuario</a></li>
        <li class="divider"></li>
        <li><a href="?c=admin&a=ReadEqui">Equipo</a></li>
        <li class="divider"></li>
        <li class="active"><a href="?c=admin&a=ReadAsig">Asignación</a></li>
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

    <form action="index.php?c=admin&a=ReadAsig" method="GET">
      <h3>Buscar asignaciones</h3>

      <div class="input-field col s5 offset-s3">
        <input type="text" name="user" autofocus>
      </div>

      <button type="submit" class="input-field col s1 btn blue-grey darken-2 tooltiped" data-position="right" data-tooltip="Buscar" href="#"><i class="small material-icons">search</i></button>
    </form>

<?php

if(isset($_POST['user'])){

  $user= $_POST['user'];
  $user= $this->model->searchAsig($user);
    if(count($user)>0){
      foreach($user as $row){ ?>

    <table class="highlight bordered input-field col s10 offset-s1">
      <thead class="card-panel blue darken-3">
        <tr id="tabla">
          <th>N° asignación</th>
          <th>Fecha de asignación</th>
          <th>Serial</th>
          <th>DUI</th>
          <th>Acción</th>
        </tr>
      </thead>

      <tbody>
        <tr>
          <td><?php echo $row['no_asig']; ?></td>
          <td><?php $date = new DateTime($row['fec_asig']); echo $date->format('d-m-Y'); ?></td>
          <td><?php echo $row['ser']; ?></td>
          <td><?php echo $row['ced']; ?></td>
          <td><a href="?Devolucion=<?php echo $row['ser'];?>&c=admin&a=ReadDev" class="btn blue-grey darken-2 tooltiped" data-position="right" data-tooltip="Devolucion de equipo"><i class="small material-icons">compare_arrows</i></a></td>
        </tr>
      </tbody>

    </table>

    <?php }

  }else{
    echo "<br><br><br><br><h5 class='info'>No se han encontrado resultados</h5>";
  }
}else{?>

    <table class="highlight bordered input-field col s10 offset-s1">
      <thead class="card-panel blue darken-3">
        <tr id="tabla">
          <th>N° asignación</th>
          <th>Fecha de asignación</th>
          <th>Serial</th>
          <th>DUI</th>
          <th>Acción</th>
        </tr>
      </thead>
      <?php foreach($result as $data){ ?>
        <tbody>
          <tr>
            <td><?php echo $data->no_asig ?></td>
            <td><?php $date = new DateTime($data->fec_asig); echo $date->format('d-m-Y') ; ?></td>
            <td><?php echo $data->ser; ?></td>
            <td><?php echo $data->ced; ?></td>
            <td><a href="?Devolucion=<?php echo $data->ser?>&c=admin&a=ReadDev" class="btn blue-grey darken-2 tooltiped" data-position="right" data-tooltip="Devolucion de equipo"><i class="small material-icons">compare_arrows</i></a></td>
          </tr>
        </tbody>
      <?php  } ?>
    </table>

  </form>
</div>
<?php } ?>
