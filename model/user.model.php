<?php

  class UserModel{

    private $pdo;
    public function __CONSTRUCT(){

      try{

        $this->pdo = DataBase::connect();
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }catch(PDOException $e){
        die($e->getMessage());
      }
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    // CRUD Usuario

    //FUnción para buscar usuarios.

    public function searchUser($data){
    try{
      $sql="SELECT * FROM usuario WHERE  ced LIKE ? OR vhur LIKE ?";
      $query = $this->pdo->prepare($sql);
      $query->execute(array("%$data%","%$data%"));
      $data = $query->fetchAll(PDO::FETCH_BOTH);
    }catch(PDOException $e){
      die($e->getMessage());
    }
    return $data;
  }

  //Función para crear usuarios

    public function CreateUser($data){
      $sql = "SELECT * FROM usuario WHERE ced = :cedula";
      $query = $this->pdo->prepare($sql);
      $query->bindValue(":cedula",$data[0]);
      $query->execute();
      $numero_registro = $query->rowCount();

      $sql = "SELECT * FROM usuario WHERE vhur = :vhur";
      $query = $this->pdo->prepare($sql);
      $query->bindValue(":vhur",$data[4]);
      $query->execute();
      $vhur = $query->rowCount();

      if($vhur>=true){
        $msn= "El vhur del usuario ya se encuentra registrado";

        return $msn;
        }elseif($numero_registro>=true){
          $msn = "El usuario ya se encuentra registrado";

          return $msn;
          }else{
            try{
              $sql = "INSERT INTO usuario VALUES(?,?,?,?,?,?,?,?)";
              $query = $this->pdo->prepare($sql);
              $query->execute(array($data[0],$data[4],$data[5],$data[6],$data[1],$data[2],$data[3],"Sin asignacion"));
              $msn = "El usuario fue guardado exitosamente";

            }catch(PDOException $e){
              $msn = $e->getMessage();
            }
              return $msn;
          }
    }

    //Función para ver los usuarios registrados.

    public function ReadUser(){
      try {
        $sql = "SELECT * FROM usuario ORDER BY nom";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetchALL(PDO::FETCH_OBJ);

      }catch(PDOException $e) {
        die($e->getMessage());
      }
      return $result;
    }

    //Función para llevar los datos del usuario a un formulario.

    public function DetalleUser($detalle){
      try {

        $sql= "SELECT * FROM usuario WHERE ced= '$detalle'";
        $query= $this->pdo->prepare($sql);
        $query->execute();
        $result= $query->fetchALL(PDO::FETCH_OBJ);

      }catch(PDOException $e) {
        die($e->getMessage());
      }
      return $result;
    }

    //Función para actualizar usuarios en los campos modificados.

    public function UpdateUser($data){
      try {
        $sql = "UPDATE usuario SET vhur= '$data[1]', nom= '$data[2]', tel= '$data[3]', site= '$data[4]', area= '$data[5]', cargo= '$data[6]' WHERE ced= :numero_user";
        $query = $this->pdo->prepare($sql);
        $query->bindValue(":numero_user",$data[0]);
        $query->execute();
        $msn = "El usuario se ha actualizado correctamente";

      }catch(PDOException $e){
        die ($e->getMessage());
      }
      return $msn;
    }

    //Función para eliminar un usuario del sistema.

    public function DeleteUser($id){

        $sql = "SELECT * FROM usuario WHERE ced= '$id' and estado= 'Asignado'";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $user = $query->rowCount();

        if($user>=true){
          $msn = "El usuario no puede ser eliminado ya que cuenta con un equipo asignado, para eliminarlo primero debe devolver el equipo.";

          return $msn;
        }else{

        try {

          $sql= "DELETE FROM usuario WHERE ced='$id'";
          $query = $this->pdo->prepare($sql);
          $query->execute();
          $msn = "El usuario se eliminó correctamente";

        }catch(PDOException $e) {
          die($e->getMessage());
        }
        return $result=$msn;
        }
      }

    //Trae los datos del select del site

    public function readSitebyUser(){
      try {
        $sql= "SELECT * FROM usu_site";
        $query= $this->pdo->prepare($sql);
        $query->execute();
        $result= $query->fetchAll(PDO::FETCH_BOTH);

      }catch(PDOException $e){
        die($e->getMessage());
      }
      return $result;
    }

    public function readSitebyAdmin(){
      try {
        $sql= "SELECT * FROM usu_site";
        $query= $this->pdo->prepare($sql);
        $query->execute();
        $result= $query->fetchAll(PDO::FETCH_OBJ);

      }catch(PDOException $e){
        die($e->getMessage());
      }
      return $result;
    }

    //Trae los datos del select del area

    public function readArea(){
      try {
        $sql= "SELECT * FROM usu_area";
        $query= $this->pdo->prepare($sql);
        $query->execute();
        $result= $query->fetchAll(PDO::FETCH_BOTH);

      }catch(PDOException $e){
        die($e->getMessage());
      }
      return $result;
    }

    //Trae los datos del select del cargo

    public function readCargo(){
      try {
        $sql= "SELECT * FROM usu_cargo";
        $query= $this->pdo->prepare($sql);
        $query->execute();
        $result= $query->fetchAll(PDO::FETCH_BOTH);

      }catch(PDOException $e){
        die($e->getMessage());
      }
      return $result;
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// CRUD Equipo

  //Función para buscar los equipos registrados.

    public function SearchEqui($data){
      try {
        $sql= "SELECT * FROM equipo WHERE ser LIKE ? OR hostname LIKE ? OR estado LIKE ?";
        $query = $this->pdo->prepare($sql);
        $query->execute(array("%$data%","%$data%","%$data%"));
        $data= $query->fetchALL(PDO::FETCH_BOTH);

      }catch(PDOException $e){
        die($e->getMessage());
      }
      return $data;
    }

    //Función para crear registrar equipos en el sistema.

    public function CreateEqui($data){
      $sql = "SELECT * FROM equipo WHERE ser = :serial";
      $query = $this->pdo->prepare($sql);
      $query->bindValue(":serial",$data[0]);
      $query-> execute();
      $numero_registro = $query->rowCount();

      if($numero_registro>=true){
        $msn = "El equipo ya se encuentra registrado";

        return $msn;
      }else{
        try{
          $sql = "INSERT INTO equipo VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
          $query = $this->pdo->prepare($sql);
          $query->execute(array($data[0],$data[1],$data[2],$data[3],$data[4],$data[5],$data[6],$data[7],$data[8],$data[9],$data[10],$data[11],"Sin asignacion"));
          $msn = "El equipo fue guardado exitosamente";

        }catch(PDOException $e){
          $msn = $e->getMessage();
        }
        return $msn;
      }
    }

    //Función para leer los equipos que se han registrado en el sistema.

    public function ReadEqui(){
      try {
        $sql = "SELECT * FROM equipo";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetchALL(PDO::FETCH_OBJ);

      }catch(PDOException $e) {
        die($e->getMessage());
      }
      return $result;
    }

    //Función para llevar los datos de un equipo determinado a un formulario.

    public function DetalleEqui($detalle){
      try {

        $sql= "SELECT * FROM equipo WHERE ser= '$detalle'";
        $query= $this->pdo->prepare($sql);
        $query->execute();
        $result= $query->fetchALL(PDO::FETCH_OBJ);

      }catch(PDOException $e) {
        die($e->getMessage());
      }
      return $result;
    }

    //Función para actualizar los datos de un equipo determinado.

    public function UpdateEqui($data){
      try {
        $sql = "UPDATE equipo SET tipo= '$data[1]', marca= '$data[2]', model= '$data[3]', memo= '$data[4]', disc_duro= '$data[5]', procesador= '$data[6]', sis_operativo= '$data[7]', type= '$data[8]', cons_inventario= '$data[9]', hostname= '$data[10]', adicional= '$data[11]' WHERE ser= :numero_equi";
        $query = $this->pdo->prepare($sql);
        $query->bindValue(":numero_equi",$data[0]);
        $query->execute();
        $msn = "El equipo se ha actualizado correctamente";

      }catch(PDOException $e){
        die ($e->getMessage());
      }
      return $msn;
    }

    //Función para eliminar un equipo determinado.

    public function DeleteEqui($id){

      $sql= "SELECT * FROM equipo WHERE ser= '$id' and estado= 'Asignado'";
      $query= $this->pdo->prepare($sql);
      $query->execute();
      $asignacion= $query->rowCount();

      if($asignacion>=true){
          $msn= 'El equipo no se puede eliminar ya que está asignado a una persona, para eliminarlo primero se debe devolver el equipo.';

          return $msn;
      }else{

      try{
        $sql= "DELETE FROM equipo WHERE ser='$id'";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $msn = "El equipo se eliminó correctamente";

      }catch(PDOException $e) {
        die($e->getMessage());
      }
      return $result=$msn;
      }
    }

    //Trae los datos del select de tipo

    public function readTipo(){
      try {
        $sql= "SELECT * FROM equi_tipo";
        $query= $this->pdo->prepare($sql);
        $query->execute();
        $result= $query->fetchAll(PDO::FETCH_BOTH);

      }catch(PDOException $e){
        die($e->getMessage());
      }
      return $result;
    }

    //Trae los datos del select de marca

    public function readMarca(){
      try {
        $sql= "SELECT * FROM equi_marca";
        $query= $this->pdo->prepare($sql);
        $query->execute();
        $result= $query->fetchAll(PDO::FETCH_BOTH);

      }catch(PDOException $e){
        die($e->getMessage());
      }
      return $result;
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    // CRUD Asignacion

    //Funcion para buscar una asignacion ya creada.

    public function SearchAsig($data){
      try {
        $sql= 'SELECT * FROM asignacion WHERE ser LIKE ? OR ced LIKE ?';
        $query= $this->pdo->prepare($sql);
        $query->execute(array("%$data%","%$data%"));
        $data= $query->fetchALL(PDO::FETCH_BOTH);

      }catch(PDOException $e){
        die($e->getMessage());
      }
      return $data;
    }

    public function SearchAsigbyEqui($serial){
      try {
        $sql= "SELECT * FROM asignacion WHERE ser= '$serial'";
        $query= $this->pdo->prepare($sql);
        $query->execute();
        $serial= $query->fetchALL(PDO::FETCH_OBJ);

      }catch(PDOException $e){
        die($e->getMessage());
      }
      return $serial;
    }

    //Funcion para crear una asignación.

    public function CreateAsig($data){
      try{
        $sql = "SELECT * FROM portatil WHERE ser = '$data[2]' AND estado = 'Asignado'";
        $query = $this->pdo->prepare($sql);
        $query-> execute();
        $numero_asig = $query->rowCount();

        $sql = "SELECT * FROM usuario WHERE ced = '$data[3]' AND estado = 'Asignado'";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $numero_usu = $query->rowCount();

        $sql = "SELECT * FROM portatil WHERE ser = '$data[2]'";
        $query = $this->pdo->prepare($sql);
        $query-> execute();
        $num_asig = $query->rowCount();

        $sql = "SELECT * FROM usuario WHERE ced = '$data[3]'";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $num_usu = $query->rowCount();

        if($numero_asig>=true){
          $msn = "El equipo ya cuenta con una persona asignada";

          return $msn;

          }elseif($numero_usu>=true){
            $msn = "El usuario ya cuenta con un equipo asignado";

            return $msn;

          }elseif($num_asig==false) {
              $msn = "El equipo no se encuentra registrado en nuestra base de datos";

              return $msn;
            }elseif($num_usu==false){
                $msn = "El usuario no se encuentra registrado en nuestra base de datos";

                return $msn;
                }else{

                    $sql = "INSERT INTO asignacion VALUES('',?,?,?,?)";
                    $query = $this->pdo->prepare($sql);
                    $query->execute(array($data[0],$data[1],$data[2],$data[3]));
                    $msn = "La asignacion fue guardada exitosamente";

                    $sql = "UPDATE portatil SET estado = 'Asignado' WHERE ser = '$data[2]'";
                    $query = $this->pdo->prepare($sql);
                    $query->execute();

                    $sql = "UPDATE usuario SET estado= 'Asignado' WHERE ced= '$data[3]'";
                    $query= $this->pdo->prepare($sql);
                    $query->execute();
                    }

                  }catch(PDOException $e){
                    $msn = $e->getMessage();
                  }
                return $msn;
    }

    //Función para leer las asignaciones que ya han sido creadas.

    public function ReadAsig(){
      try {
        $sql = "SELECT * FROM asignacion";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetchALL(PDO::FETCH_OBJ);

      }catch(PDOException $e) {
      die($e->getMessage());
      }
      return $result;
    }


////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    // CRUD Devolución

    //Función para leer las devoluciones ya creadas.

    public function ReadDev($Devolucion){
    try{
      $sql = "SELECT * FROM asignacion WHERE ser= '$Devolucion'";
      $query = $this->pdo->prepare($sql);
      $query->execute();
      $result = $query->fetchALL(PDO::FETCH_OBJ);

    }catch(PDOException $e){
      die($e->getMessage());
    }
    return $result;
  }

  //Función para crear devoluciones.

    public function CreateDev($data){
      try {
        $sql = "DELETE FROM asignacion WHERE no_asig = :numero_asig";
        $query = $this->pdo->prepare($sql);
        $query->bindValue(":numero_asig",$data[5]);
        $query->execute();

        $sql = "UPDATE portatil SET estado = 'Sin asignacion' WHERE ser = '$data[3]'";
        $query = $this->pdo->prepare($sql);
        $query->execute();

        $sql = "UPDATE usuario SET estado = 'Sin asignacion' WHERE ced = '$data[4]'";
        $query = $this->pdo->prepare($sql);
        $query->execute();

        $sql = "INSERT INTO devolucion VALUES ('',?,?,?,?,?,?)";
        $query = $this->pdo->prepare($sql);
        $query->execute(array($data[0],$data[1],$data[2],$data[3],$data[4],$data[5]));
        $msn = "El equipo ha sido devuelto";

      }catch(PDOException $e) {
        die($e->getMessage());
      }
      return $msn;
    }

    //Función para leer las devoluciones que se han hecho.

    public function ReadHis(){
      try {
        $sql = "SELECT * FROM devolucion";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetchALL(PDO::FETCH_OBJ);

      }catch(PDOException $e) {
          die($e->getMessage());
      }
      return $result;
    }

    //Función para buscar en el historial de devoluciones.

    public function SearchHis($data){
      try {
        $sql= "SELECT * FROM devolucion WHERE no_dev LIKE ? OR fec_asig LIKE ? OR fec_dev LIKE ? OR tipo_dev LIKE ? OR ser LIKE ? OR ced LIKE ? OR no_asig LIKE ?";
        $query = $this->pdo->prepare($sql);
        $query->execute(array("%$data%","%$data%","%$data%","%$data%","%$data%","%$data%","%$data%"));
        $data= $query->fetchAll(PDO::FETCH_BOTH);

      }catch(PDOException $e) {
        die($e->getMessage());
      }
      return $data;
    }

    //Función para eliminar las devoluciones creadas.

    public function DeleteDev($id){
      try {
        $sql = "DELETE FROM devolucion WHERE no_dev='$id'";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $msn = "La devolucion fue eliminada del historial";

      }catch(PDOException $e) {
        die($e->getMessage());
      }
      return $result=$msn;
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function __DESTRUCT(){
      try {

        DataBase::disconnet();

      }catch(PDOException $e) {
        die($e->getMessage());
      }
    }


  }

?>
