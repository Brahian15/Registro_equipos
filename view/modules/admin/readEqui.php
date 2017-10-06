<div class="row z-depth-4" id="filas">

  <form action="" method="post">

    <nav>
      <ul id="dropdown1" class="dropdown-content">
        <li><a href="?c=admin&a=ReadUser">Usuario</a></li>
        <li class="divider"></li>
        <li class="active"><a href="?c=admin&a=ReadEqui">Equipo</a></li>
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

    <form action="index.php?c=admin&a=ReadEqui" method="GET">
      <h3>Buscar equipos</h3>

      <div class="input-field col s5 offset-s3">
        <input type="text" name="user" autofocus>
      </div>

      <button type="submit" class="input-field col s1 btn blue-grey darken-2 tooltiped" data-position="right" data-delay="50" data-tooltip="Buscar" href="?c=admin&a=searchEqui"><i class="small material-icons">search</i></button>
    </form>

    <?php

    if(isset($_POST['user'])){

      $user= $_POST['user'];
      $user= $this->model->searchEqui($user);
      if(count($user)>0){
        foreach($user as $row){ ?>

    <table class="highlight bordered input-field col s10 offset-s1">
      <thead class="card-panel blue darken-3">
        <tr id="tabla">
          <th>Serial</th>
          <th>Tipo</th>
          <th>Marca</th>
          <th>Consecutivo inventario</th>
          <th>Hostname</th>
          <th>Estado</th>
          <th>Acción</th>
          <th></th>
          <th></th>
          <th></th>
        </tr>
      </thead>

      <tbody>
        <tr>
          <td><?php echo $row['ser']; ?></td>
          <td><?php echo $row['nom_tipo']; ?></td>
          <td><?php echo $row['nom_marca']; ?></td>
          <td><?php echo $row['cons_inventario']; ?></td>
          <td><?php echo $row['hostname']; ?></td>
          <td><?php echo $row['estado']; ?></td>
          <td><a href="?detalle=<?php echo $row['ser'];?>&c=admin&a=DetalleEqui" class="btn blue-grey darken-2 tooltiped" data-position="left" data-tooltip="Detalle del equipo"><i class="small material-icons">assignment</i></a></td>
          <td><a href="?serial=<?php echo $row['ser'];?>&c=admin&a=SearchAsig" class="btn blue-grey darken-2 tooltiped" data-position="top" data-tooltip="Asignación del equipo"><i class="small material-icons">assignment_late</i></a></td>
          <?php if($_SESSION["user"]["rol"] == "1"){ ?>
            <td><a href="?id=<?php echo $row['ser'];?>&c=admin&a=DeleteEqui" class="btn blue-grey darken-2 tooltiped" data-position="right" data-tooltip="Eliminar equipo" onclick="return confirm('¿Desea eliminar el equipo permanentemente?')"><i class="small material-icons">delete</i></a></td>
          <?php } ?>
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
          <th>Serial</th>
          <th>Tipo</th>
          <th>Marca</th>
          <th>Consecutivo inventario</th>
          <th>Hostname</th>
          <th>Estado</th>
          <th>Acción</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
    <?php foreach($result as $data){ ?>
      <tbody>
        <tr>
          <td><?php echo $data->ser; ?></td>
          <td><?php echo $data->nom_tipo; ?></td>
          <td><?php echo $data->nom_marca; ?></td>
          <td><?php echo $data->cons_inventario; ?></td>
          <td><?php echo $data->hostname; ?></td>
          <td><?php echo $data->estado; ?></td>
          <td><a href="?detalle=<?php echo $data->ser?>&c=admin&a=DetalleEqui" class="btn blue-grey darken-2 tooltiped" data-position="left" data-tooltip="Detalle del equipo"><i class="small material-icons">assignment</i></a></td>
          <td><a href="?serial=<?php echo $data->ser;?>&c=admin&a=SearchAsig" class="btn blue-grey darken-2 tooltiped" data-position="top" data-tooltip="Asignación del equipo"><i class="small material-icons">assignment_late</i></a></td>
          <?php if($_SESSION["user"]["rol"] == "1"){ ?>
            <td><a href="?id=<?php echo $data->ser?>&c=admin&a=DeleteEqui" class="btn blue-grey darken-2 tooltiped" data-position="right" data-tooltip="Eliminar equipo" onclick="return confirm('¿Desea eliminar el equipo permanentemente?')"><i class="small material-icons">delete</i></a></td>
          <?php } ?>
        </tr>
      </tbody>
    <?php  } ?>

    </table>

  </form>

</div>

<?php } ?>
