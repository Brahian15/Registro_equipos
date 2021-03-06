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
    //                                                                                                            //
    //                                                LOGIN                                                       //
    //                                                                                                            //
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //Funcion para crear el usuario y el sistema de logueo

    public function CreateUserLog($data){
      try{

 			 	$sql = "INSERT INTO users VALUES (?,?,?,?,?)";
 				$query = $this->pdo->prepare($sql);
 				$query->execute(array($data[5],$data[0],$data[1],$data[3],$data[2]));

 				$sql = "INSERT INTO access VALUES (?,?,?,0,?)";
 				$query = $this->pdo->prepare($sql);
 				$query->execute(array($data[6],$data[5],$data[4],$data[7]));
 				$msn = "Guardo con exito";

 				}catch (PDOException $e) {
          $code = $e->getCode();
					$text = $e->getMessage();
					$file = $e->getFile();
					$line = $e->getLine();
					$msn = "Ocurrio un error, notificarle al administrador";
					DataBase::createLog($code, $text, $file, $line);
 			  }

 				return $msn;
 		 }

     //Funcion para verificar si el correo ingresado si existe

     public function readUserbyEmail($data){
   			try{
   				$sql = "SELECT users.user_id, users.user_name, users.user_lastname, access.acc_token, access.acc_pass, rol.no_rol FROM users INNER JOIN access ON (users.user_id = access.user_id) INNER JOIN rol ON (users.no_rol = rol.no_rol) WHERE user_email = ?";
   				$query = $this->pdo->prepare($sql);
   				$query->execute(array($data[0]));
   				$result = $query->fetch(PDO::FETCH_BOTH);

   			}catch (PDOException $e) {
   				$code = $e->getCode();
   				$text = $e->getMessage();
   				$file = $e->getFile();
   				$line = $e->getLine();

   				DataBase::createLog($code, $text, $file, $line);
   		}

   		return $result;
   	}

    //Funcion para enviar al formulario de registro los roles registrados

    public function ReadRol(){
      try {
        $sql= "SELECT * FROM rol";
        $query= $this->pdo->prepare($sql);
        $query->execute();
        $result= $query->fetchAll(PDO::FETCH_BOTH);

      }catch(PDOException $e){
        die($e->getMessage());
      }
      return $result;
    }

    //Funcion para ver la contraseña de un usuario determinado

    public function ReadPass($data){
      try{
        $sql= "SELECT * FROM access INNER JOIN users ON (access.user_id = users.user_id) WHERE users.user_email = ? ";
        $query= $this->pdo->prepare($sql);
        $query->execute(array($data));
        $result = $query->fetch(PDO::FETCH_BOTH);

      }catch(PDOException $e) {
        die($e->getMessage());
      }

      return $result;
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //                                                                                                            //
    //                                            CRUD USUARIO                                                    //
    //                                                                                                            //
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //Función para buscar usuarios.

    public function searchUser($data){
    try{
      $sql="SELECT * FROM usuario INNER JOIN usu_site ON (usuario.no_site = usu_site.no_site) INNER JOIN usu_area ON (usuario.no_area = usu_area.no_area) INNER JOIN usu_cargo ON (usuario.no_cargo = usu_cargo.no_cargo) WHERE  ced LIKE ? OR vhur LIKE ?";
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
        $sql = "SELECT * FROM usuario INNER JOIN usu_site ON (usuario.no_site = usu_site.no_site) INNER JOIN usu_area ON (usuario.no_area = usu_area.no_area) INNER JOIN usu_cargo ON (usuario.no_cargo = usu_cargo.no_cargo) ORDER BY nom";
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

        $sql= "SELECT * FROM usuario INNER JOIN usu_site ON (usuario.no_site = usu_site.no_site) INNER JOIN usu_area ON (usuario.no_area = usu_area.no_area) INNER JOIN usu_cargo ON (usuario.no_cargo = usu_cargo.no_cargo) WHERE ced= '$detalle'";
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
        $sql = "UPDATE usuario SET vhur= '$data[1]', nom= '$data[2]', tel= '$data[3]' WHERE ced= :numero_user";
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

    //Trae los datos del select del site al formulario user

    public function ReadSitebyUser(){
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

    //Trae los datos del select del site al formulario adminSite

    public function ReadSitebyAdmin(){
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

    //Guarda nuevos sites en la base de datos

    public function CreateSite($data){
      try {
        $sql= "INSERT INTO usu_site VALUES('',?)";
        $query= $this->pdo->prepare($sql);
        $query->execute(array($data[0]));
        $msn= "El site fue guardado exitosamente";

      }catch(PDOException $e){
        die($e->getMessage());
      }
      return $msn;
    }

    //Elimina los sites de la base de datos

    public function DeleteSite($id){
      $sql= "SELECT * FROM usuario WHERE no_site='$id'";
      $query= $this->pdo->prepare($sql);
      $query->execute();
      $id_site= $query->rowCount();

      if($id_site==true){
        $msn= "No se puede eliminar el site ya que cuenta con usuarios asignados";

        return $msn;
      }else{

        try {
          $sql= "DELETE FROM usu_site WHERE no_site='$id'";
          $query= $this->pdo->prepare($sql);
          $query->execute();
          $msn= "El site se eliminó correctamente";

        }catch(PDOException $e){
          die($e->getMessage());
        }
        return $msn;
      }
    }

    //Trae los datos del select del area

    public function ReadAreabyUser(){
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

    //Trae los datos del select al formulario de adminArea

    public function ReadAreabyAdmin(){
      try {
        $sql= "SELECT * FROM usu_area";
        $query= $this->pdo->prepare($sql);
        $query->execute();
        $result= $query->fetchAll(PDO::FETCH_OBJ);

      }catch(PDOException $e){
        die($e->getMessage());
      }
      return $result;
    }

    //Crea nuevas areas en la base de datos

    public function CreateArea($data){
      try {
        $sql= "INSERT INTO usu_area VALUES('',?)";
        $query= $this->pdo->prepare($sql);
        $query->execute(array($data[0]));
        $msn= "El area fue guardada exitosamente";

      }catch(PDOException $e){
        die($e->getMessage());
      }
      return $msn;
    }

    //Elimina el area de la base de datos

    public function DeleteArea($id){
      $sql= "SELECT * FROM usuario WHERE no_area='$id'";
      $query= $this->pdo->prepare($sql);
      $query->execute();
      $id_area= $query->rowCount();

      if ($id_area==true) {
        $msn= "No se puede eliminar el site ya que cuenta con usuarios asignados";

        return $msn;
      }else{

        try {
          $sql= "DELETE FROM usu_area WHERE no_area='$id'";
          $query= $this->pdo->prepare($sql);
          $query->execute();
          $msn= "El area se eliminó correctamente";
        }catch(PDOException $e){
          die($e->getMessage());
        }
        return $msn;
      }
    }

    //Trae los datos del select del cargo

    public function ReadCargobyUser(){
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

    //Trae los datos del select al formulario adminCargo

    public function ReadCargobyAdmin(){
      try {
        $sql= "SELECT * FROM usu_cargo";
        $query= $this->pdo->prepare($sql);
        $query->execute();
        $result= $query->fetchALL(PDO::FETCH_OBJ);

      }catch(PDOException $e){
        die($e->getMessage());
      }
      return $result;
    }

    //Guarda un nuevo cargo en la base de datos

    public function CreateCargo($data){
      try {
        $sql= "INSERT INTO usu_cargo VALUES('',?)";
        $query= $this->pdo->prepare($sql);
        $query->execute(array($data[0]));
        $msn= "El cargo fue creado exitosamente";

      }catch(PDOException $e){
        die($e->getMessage());
      }
      return $msn;
    }

    //Elimina los cargos de la base de datos

    public function DeleteCargo($id){
      $sql= "SELECT * FROM usuario WHERE no_cargo='$id'";
      $query= $this->pdo->prepare($sql);
      $query->execute();
      $id_cargo= $query->rowCount();

      if ($id_cargo==true){
        $msn= "No se puede eliminar el cargo ya que cuenta con usuarios asignados";

        return $msn;
      }else{
        try {
          $sql= "DELETE FROM usu_cargo WHERE no_cargo='$id'";
          $query= $this->pdo->prepare($sql);
          $query->execute();
          $msn= "El cargo se eliminó correctamente";

        }catch(PDOException $e){
          die($e->getMessage());
        }
        return $msn;
      }
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //                                                                                                            //
    //                                            CRUD EQUIPO                                                     //
    //                                                                                                            //
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  //Función para buscar los equipos registrados.

    public function SearchEqui($data){
      try {
        $sql= "SELECT * FROM equipo INNER JOIN equi_tipo ON (equipo.no_tipo = equi_tipo.no_tipo) INNER JOIN equi_marca ON (equipo.no_marca = equi_marca.no_marca) WHERE ser LIKE ? OR hostname LIKE ? OR estado LIKE ?";
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
        $sql = "SELECT * FROM equipo INNER JOIN equi_tipo ON (equipo.no_tipo = equi_tipo.no_tipo) INNER JOIN equi_marca ON (equipo.no_marca = equi_marca.no_marca)";
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

        $sql= "SELECT * FROM equipo INNER JOIN equi_tipo ON (equipo.no_tipo = equi_tipo.no_tipo) INNER JOIN equi_marca ON (equipo.no_marca = equi_marca.no_marca) WHERE ser= '$detalle'";
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
        $sql = "UPDATE equipo SET model= '$data[3]', memo= '$data[4]', disc_duro= '$data[5]', procesador= '$data[6]', sis_operativo= '$data[7]', type= '$data[8]', cons_inventario= '$data[9]', hostname= '$data[10]', adicional= '$data[11]' WHERE ser= :numero_equi";
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

    public function ReadTipobyEqui(){
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

    //Trae los datos del select al formulario adminTipo

    public function ReadTipobyAdmin(){
      try {
        $sql= "SELECT * FROM equi_tipo";
        $query= $this->pdo->prepare($sql);
        $query->execute();
        $result= $query->fetchAll(PDO::FETCH_OBJ);

      }catch(PDOException $e){
        die($e->getMessage());
      }
      return $result;
    }

    //Guarda nuevos tipos a la base de datos

    public function CreateTipo($data){
      try {
        $sql= "INSERT INTO equi_tipo VALUES('',?)";
        $query= $this->pdo->prepare($sql);
        $query->execute(array($data[0]));
        $msn= "El tipo fue creado exitosamente";

      }catch(PDOException $e){
        die($e->getMessage());
      }
      return $msn;
    }

    //Elimina los tipos de la base de datos

    public function DeleteTipo($id){
      $sql= "SELECT * FROM equipo WHERE no_tipo='$id'";
      $query= $this->pdo->prepare($sql);
      $query->execute();
      $id_tipo= $query->rowCount();

      if ($id_tipo==true){
        $msn= "No se puede eliminar el tipo ya que cuenta con un equipo asignado";

        return $msn;
      }else{
        try {
          $sql= "DELETE FROM equi_tipo WHERE no_tipo='$id'";
          $query= $this->pdo->prepare($sql);
          $query->execute();
          $msn= "El tipo se eliminó exitosamente";

        }catch(PDOException $e){
          die($e->getMessage());
        }
        return $msn;
      }
    }

    //Trae los datos del select de marca

    public function ReadMarcabyEqui(){
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

    //Trae los datos del select al formulario adminMarca

    public function ReadMarcabyAdmin(){
      try {
        $sql= "SELECT * FROM equi_marca";
        $query= $this->pdo->prepare($sql);
        $query->execute();
        $result= $query->fetchAll(PDO::FETCH_OBJ);

      }catch(PDOException $e){
        die($e->getMessage());
      }
      return $result;
    }

    //Guarda una nueva marca en la base de datos

    public function CreateMarca($data){
      try {
        $sql= "INSERT INTO equi_marca VALUES('',?)";
        $query= $this->pdo->prepare($sql);
        $query->execute(array($data[0]));
        $msn= "La marca se registró exitosamente";

      }catch(PDOException $e){
        die($e->getMessage());
      }
      return $msn;
    }

    //Elimina las marcas de la base de datos

    public function DeleteMarca($id){
      $sql= "SELECT * FROM equipo WHERE no_marca='$id'";
      $query= $this->pdo->prepare($sql);
      $query->execute();
      $id_marca= $query->rowCount();

      if ($id_marca==true){
        $msn= "No se puede eliminar la marca ya que cuenta con equipos asignados";

        return $msn;
      }else{
        try {
          $sql= "DELETE FROM equi_marca WHERE no_marca='$id'";
          $query= $this->pdo->prepare($sql);
          $query->execute();
          $msn= "La marca se eliminó correctamente";

        }catch(PDOException $e){
          die($e->getMessage());
        }
        return $msn;
      }
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //                                                                                                            //
    //                                           CRUD ASIGNACION                                                  //
    //                                                                                                            //
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //Funcion para buscar una asignacion ya creada.

    public function SearchAsig($data){
      try {
        $sql= "SELECT asignacion.no_asig, asignacion.fec_asig, asignacion.ser, asignacion.ced, CONCAT(users.user_name, ' ', users.user_lastname) AS nombre_completo FROM asignacion INNER JOIN users ON (asignacion.user_id = users.user_id) WHERE ser LIKE ? OR ced LIKE ?";
        $query= $this->pdo->prepare($sql);
        $query->execute(array("%$data%","%$data%"));
        $data= $query->fetchALL(PDO::FETCH_BOTH);

      }catch(PDOException $e){
        die($e->getMessage());
      }
      return $data;
    }

    //Funcion para ver asignaciones dependiendo del equipo seleccionado

    public function SearchAsigbyEqui($serial){
      try {
        $sql= "SELECT asignacion.no_asig, asignacion.fec_asig, asignacion.ser, asignacion.ced, CONCAT(users.user_name, ' ', users.user_lastname) AS nombre_completo FROM asignacion INNER JOIN users ON (asignacion.user_id = users.user_id) WHERE ser= '$serial'";
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
        $sql = "SELECT * FROM equipo WHERE ser = '$data[1]' AND estado = 'Asignado'";
        $query = $this->pdo->prepare($sql);
        $query-> execute();
        $numero_asig = $query->rowCount();

        $sql = "SELECT * FROM usuario WHERE ced = '$data[2]' AND estado = 'Asignado'";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $numero_usu = $query->rowCount();

        $sql = "SELECT * FROM equipo WHERE ser = '$data[1]'";
        $query = $this->pdo->prepare($sql);
        $query-> execute();
        $num_asig = $query->rowCount();

        $sql = "SELECT * FROM usuario WHERE ced = '$data[2]'";
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
                    $query->execute(array($data[0],$data[1],$data[2],$_SESSION["user"]["code"]));
                    $msn = "La asignacion fue guardada exitosamente";

                    $sql = "UPDATE equipo SET estado = 'Asignado' WHERE ser = '$data[1]'";
                    $query = $this->pdo->prepare($sql);
                    $query->execute();

                    $sql = "UPDATE usuario SET estado= 'Asignado' WHERE ced= '$data[2]'";
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
        $sql = "SELECT asignacion.no_asig, asignacion.fec_asig, asignacion.ser, asignacion.ced, CONCAT(users.user_name, ' ', users.user_lastname) AS nombre_completo FROM asignacion INNER JOIN users ON (asignacion.user_id = users.user_id)";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetchALL(PDO::FETCH_OBJ);

      }catch(PDOException $e) {
      die($e->getMessage());
      }
      return $result;
    }


    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //                                                                                                            //
    //                                              CRUD DEVOLUCIONES                                             //
    //                                                                                                            //
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

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
        $query->bindValue(":numero_asig",$data[4]);
        $query->execute();

        $sql = "UPDATE equipo SET estado = 'Sin asignacion' WHERE ser = '$data[2]'";
        $query = $this->pdo->prepare($sql);
        $query->execute();

        $sql = "UPDATE usuario SET estado = 'Sin asignacion' WHERE ced = '$data[3]'";
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
        $sql= "SELECT * FROM devolucion WHERE no_dev LIKE ? OR fec_asig LIKE ? OR fec_dev LIKE ? OR ser LIKE ? OR ced LIKE ? OR no_asig LIKE ?";
        $query = $this->pdo->prepare($sql);
        $query->execute(array("%$data%","%$data%","%$data%","%$data%","%$data%","%$data%"));
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
    //                                                                                                            //
    //                                         FUNCION CERRAR SESION                                              //
    //                                                                                                            //
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //Funcion para cerrar la sesion del usuario que esta logueado en el momento

    public function __DESTRUCT(){
      try {

        DataBase::disconnet();

      }catch(PDOException $e) {
        die($e->getMessage());
      }
    }


  }

?>
