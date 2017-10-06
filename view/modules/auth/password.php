<div class="row" id="pg-inicio">
  <div id="login" class="z-depth-4 center col m4 offset-m4">
      <form id="frmLogin" method="post" data-parsley-validate>
        <div class="card-panel blue darken-3">
          <h3 class="center-align">RECORDAR CONTRASEÑA</h3>
        </div>

          <label id="pass">Su contraseña es: <?php echo $data['acc_pass']; ?></label>

      </form>

      <a id="btnCanc" href="index.php?c=auth&a=login" class="btn waves-effect waves-light blue-grey darken-2 col s12">Regresar</a>

  </div>
</div>
