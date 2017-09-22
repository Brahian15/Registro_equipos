<div class="row z-depth-4" id="filas">
  <form action="" method="post">

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

    <form action="index.php?c=admin&a=index" method="GET">
      <h3>Buscar usuarios</h3>

      <div class="input-field col s5 offset-s3">
        <input type="text" name="user">
      </div>

      <button type="submit" class="input-field col s1 btn blue-grey darken-2 tooltiped" data-position="right" data-tooltip="Buscar" href="?c=admin&a=SearchUser"><i class="small material-icons">search</i></button>

    </form>

<?php

if(isset($_POST['user'])){


  $user= $_POST['user'];
  $user= $this->model->searchUser($user);
      if(count($user)>0){
      foreach($user as $row){ ?>

    <table class="highlight bordered input-field col s10 offset-s1">
      <thead class="blue darken-3">
        <tr id="tabla">
          <th>DUI</th>
          <th>VHUR</th>
          <th>Nombre</th>
          <th>Teléfono</th>
          <th>Site</th>
          <th>Area</th>
          <th>Cargo</th>
          <th>Estado</th>
          <th>Acción</th>
          <th></th>
        </tr>
      </thead>

      <tbody>
        <tr>
          <td><?php echo $row['ced']; ?></td>
          <td><?php echo $row['vhur']; ?></td>
          <td><?php echo $row['nom']; ?></td>
          <td><?php echo $row['tel']; ?></td>
          <td><?php echo $row['nom_site']; ?></td>
          <td><?php echo $row['nom_area']; ?></td>
          <td><?php echo $row['nom_cargo']; ?></td>
          <td><?php echo $row['estado']; ?></td>
          <td><a href="?detalle=<?php echo $row['ced'];?>&c=admin&a=DetalleUser" class="btn blue-grey darken-2 tooltiped" data-position="top" data-tooltip="Actualizar usuario"><i class="small material-icons">update</i></a></td>
          <td><a href="?id=<?php echo $row['ced'];?>&c=admin&a=DeleteUser" class="btn blue-grey darken-2 tooltiped" data-position="right" data-tooltip="Eliminar usuario" onclick="return confirm('¿Desea eliminar el usuario permanentemente?')"><i class="small material-icons">delete</i></a></td>
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
          <th>DUI</th>
          <th>VHUR</th>
          <th>Nombre</th>
          <th>Teléfono</th>
          <th>Site</th>
          <th>Area</th>
          <th>Cargo</th>
          <th>Estado</th>
          <th>Acción</th>
          <th></th>
        </tr>
      </thead>
    <?php foreach($result as $data){ ?>
      <tbody>
        <tr>
          <td><?php echo $data->ced; ?></td>
          <td><?php echo $data->vhur; ?></td>
          <td><?php echo $data->nom; ?></td>
          <td><?php echo $data->tel; ?></td>
          <td><?php echo $data->nom_site; ?></td>
          <td><?php echo $data->nom_area; ?></td>
          <td><?php echo $data->nom_cargo; ?></td>
          <td><?php echo $data->estado; ?></td>
          <td><a href="?detalle=<?php echo $data->ced?>&c=admin&a=DetalleUser" class="btn blue-grey darken-2 tooltiped" data-position="top" data-tooltip="Actualizar usuario"><i class="small material-icons">update</i></a></td>
          <td><a onclick="return confirm('¿Desea eliminar el usuario permanentemente?')" href="?id=<?php echo $data->ced?>&c=admin&a=DeleteUser" class="btn blue-grey darken-2 tooltiped" data-position="right" data-tooltip="Eliminar usuario"><i class="small material-icons">delete</i></a></td>
        </tr>
      </tbody>
    <?php  } ?>

    </table>

  </form>

</div>

<?php } ?>
