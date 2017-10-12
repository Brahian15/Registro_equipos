<?php
  require_once 'model/user.model.php';
  require_once 'load.controller.php';
  require_once 'auth.controller.php';
  require_once 'view/assets/random.php';

  class AdminController{

    private $model;
    private $load;
    private $users;

    public function __CONSTRUCT(){
      $this->model = new UserModel();
      $this->load = new LoadController();
      $this->users = new UserModel();
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //                                                                                                            //
    //                                                LOGIN                                                       //
    //                                                                                                            //
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //Funcion para crear los campos del acceso del usuario

    public function CreateUserLog(){
      $data = $_POST["data"];
      // Indice4 = id usuario
      // Indice5 = token
      // Indice6 = status

      $data[5] = "USU-".date('Ymd').'-'.date('hms');
      $data[6] = randAlphanum(50);
      $data[7] = "Inactivo";

      $response = $this->model->CreateUserLog($data);

      header("Location: Inicio?msn=$response");
    }

    //Vista de la pagina principal del sistema

    public function index(){
      if(!isset($_SESSION["user"])){
         header("location: index.php?c=auth&a=login ");
      }else{
        header("Location: ?c=admin&a=ReadUser");
      }
    }

    //Vista del formulario de registro

    public function registerGuest(){

        require_once 'view/include/header.php';
        require_once 'view/modules/auth/register.php';
        require_once 'view/include/footer.php';
    }

  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //                                                                                                            //
  //                                          MODULO DE USUARIO                                                 //
  //                                                                                                            //
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  //Funcion para ver el formulario de registro de usuarios en el sistema

    public function User(){
      if(!isset($_SESSION["user"])){
         header("location: index.php?c=auth&a=login ");
      }else{
        require_once 'view/include/header.php';
        require_once 'view/modules/admin/user.php';
        require_once 'view/include/footer.php';
      }
    }

    //Funcion para ver los registros de los usuarios en el sistema

    public function ReadUser(){
      if(!isset($_SESSION["user"])){
         header("location: index.php?c=auth&a=login ");
      }else{
        require_once 'view/include/header.php';
        $result = $this->model->ReadUser();
        require_once 'view/modules/admin/readUser.php';
        require_once 'view/include/footer.php';
      }
    }

    //Funcion para ver el detalle de los usuarios registrados en el sistema

    public function DetalleUser(){
      if(!isset($_SESSION["user"])){
         header("location: index.php?c=auth&a=login ");
      }else{
        require_once 'view/include/header.php';
        $detalle = $_GET['detalle'];
        $result = $this->model->DetalleUser($detalle);
        require_once 'view/modules/admin/detalleUser.php';
        require_once 'view/include/footer.php';
      }
    }

    //Funcion para actualizar un usuario determinado en el sistema

    public function UpdateUser(){
      if(!isset($_SESSION["user"])){
         header("location: index.php?c=auth&a=login ");
      }else{
        $data = $_POST['data'];
        $result = $this->model->UpdateUser($data);
        header("Location: ?c=admin&a=readUser&msn=$result");
      }
    }

    //Funcion para registrar un usuario en el sistema

    public function CreateUser(){
      if(!isset($_SESSION["user"])){
         header("location: index.php?c=auth&a=login ");
      }else{
        $data = $_POST["data"];
        $result = $this->model->CreateUser($data);
        header("Location: ?c=admin&a=User&msn=$result");
      }
    }

    //Funcion para eliminar usuarios determinados en el sistema

    public function DeleteUser(){
      if(!isset($_SESSION["user"])){
         header("location: index.php?c=auth&a=login ");
      }else{
        $id = $_GET['id'];
        $result = $this->model->DeleteUser($id);
        header("Location: ?c=admin&a=readUser&msn=$result");
      }
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //                                                                                                            //
    //                                           MODULO DE EQUPO                                                  //
    //                                                                                                            //
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //Funcion para ver el formulario de registro de los equipos en el sistema

    Public function Equipo(){
      if(!isset($_SESSION["user"])){
         header("location: index.php?c=auth&a=login ");
      }else{
        require_once 'view/include/header.php';
        require_once 'view/modules/admin/equipo.php';
        require_once 'view/include/footer.php';
      }
    }

    //Funcion para registrar equipos en el sistema

    public function CreateEqui(){
      if(!isset($_SESSION["user"])){
         header("location: index.php?c=auth&a=login ");
      }else{
        $data = $_POST["data"];
        $result = $this->model->CreateEqui($data);
        header("Location: ?c=admin&a=equipo&msn=$result");
      }
    }

    //Funcion para ver los registros de los equipos en el sistema

    public function ReadEqui(){
      if(!isset($_SESSION["user"])){
         header("location: index.php?c=auth&a=login ");
      }else{
        require_once 'view/include/header.php';
        $result = $this->model->ReadEqui();
        require_once 'view/modules/admin/readEqui.php';
        require_once 'view/include/footer.php';
      }
    }

    //Funcion para ver todos los detalles del equipo en el sistema

    public function DetalleEqui(){
      if(!isset($_SESSION["user"])){
         header("location: index.php?c=auth&a=login ");
      }else{
        require_once 'view/include/header.php';
        $detalle = $_GET['detalle'];
        $result = $this->model->DetalleEqui($detalle);
        require_once 'view/modules/admin/detalleEqui.php';
        require_once 'view/include/footer.php';
      }
    }

    //Funcion para actualizar un equipo determinado en el sistema

    public function UpdateEqui(){
      if(!isset($_SESSION["user"])){
         header("location: index.php?c=auth&a=login ");
      }else{
        $data = $_POST['data'];
        $result = $this->model->UpdateEqui($data);
        header("Location: ?c=admin&a=ReadEqui&msn=$result");
      }
    }

    //Funcion para eliminar equipos determindos en el sistema

    public function DeleteEqui(){
      if(!isset($_SESSION["user"])){
         header("location: index.php?c=auth&a=login ");
      }else{
        $id = $_GET['id'];
        $result = $this->model->DeleteEqui($id);
        header("Location: ?c=admin&a=ReadEqui&msn=$result");
      }
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //                                                                                                            //
    //                                          MODULO DE ASIGNACION                                              //
    //                                                                                                            //
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //Funcion para ver el formulario de registro de asignaciones en el sistema

    public function Asignacion(){
      if(!isset($_SESSION["user"])){
         header("location: index.php?c=auth&a=login ");
      }else{
        require_once 'view/include/header.php';
        require_once 'view/modules/admin/asignacion.php';
        require_once 'view/include/footer.php';
      }
    }

    //Funcion para registrar asignaciones en el sistema

    public function CreateAsig(){
      if(!isset($_SESSION["user"])){
         header("location: index.php?c=auth&a=login ");
      }else{
        $data = $_POST["data"];
        $result = $this->model->CreateAsig($data);
        header("Location: ?c=admin&a=Asignacion&msn=$result");
      }
    }

    //Funcion para ver los registros de asignaciones en el sistema

    public function ReadAsig(){
      if(!isset($_SESSION["user"])){
         header("location: index.php?c=auth&a=login ");
      }else{
        require_once 'view/include/header.php';
        $result = $this->model->ReadAsig();
        require_once 'view/modules/admin/readAsig.php';
        require_once 'view/include/footer.php';
      }
    }

    //Funcion para ver la asignacion de determinado equipo en el sistema

    public function SearchAsig(){
      if(!isset($_SESSION["user"])){
         header("location: index.php?c=auth&a=login ");
      }else{
        require_once 'view/include/header.php';
        $serial= $_GET["serial"];
        $result= $this->model->SearchAsigbyEqui($serial);
        require_once 'view/modules/admin/readAsig.php';
        require_once 'view/include/footer.php';
      }
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //                                                                                                            //
    //                                        MODULO DE DEVOLUCION                                                //
    //                                                                                                            //
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //Funcion para ver el formulario de devoluciones en el sistema

    public function ReadDev(){
      if(!isset($_SESSION["user"])){
         header("location: index.php?c=auth&a=login ");
      }else{
        require_once 'view/include/header.php';
        $Devolucion= $_GET['Devolucion'];
        $result = $this->model->ReadDev($Devolucion);
        require_once 'view/modules/admin/ReadDev.php';
        require_once 'view/include/footer.php';
      }
    }

    //Funcion para realizar devoluciones en el sistema

    public function CreateDev(){
      if(!isset($_SESSION["user"])){
         header("location: index.php?c=auth&a=login ");
      }else{
        $data = $_POST["data"];
        $result = $this->model->CreateDev($data);
        header("Location: ?c=admin&a=ReadAsig&msn=$result");
      }
    }

    //Funcion para ver los registros de devoluciones en el sistema

    public function ReadHis(){
      if(!isset($_SESSION["user"])){
         header("location: index.php?c=auth&a=login ");
      }else{
        require_once 'view/include/header.php';
        $result = $this->model->ReadHis();
        require_once 'view/modules/admin/historial.php';
        require_once 'view/include/footer.php';
      }
    }

    //Funcion para eliminar devoluciones determinadas en el sistema

    public function DeleteDev(){
      if(!isset($_SESSION["user"])){
         header("location: index.php?c=auth&a=login ");
      }else{
        $id = $_GET['id'];
        $result = $this->model->DeleteDev($id);
        header("Location: ?c=admin&a=ReadHis&msn=$result");
      }
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //                                                                                                            //
    //                                      MODULO ADMINISTRAR LISTAS                                             //
    //                                                                                                            //
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //Funcion para ver los sites en el sistema

    public function AdminSite(){
      if(!isset($_SESSION["user"])){
         header("location: index.php?c=auth&a=login ");
      }else{
        require_once 'view/include/header.php';
        $result= $this->model->ReadSitebyAdmin();
        require_once 'view/modules/admin/adminSite.php';
        require_once 'view/include/footer.php';
      }
    }

    //Funcion para registrar sites en el sistema

    public function CreateSite(){
      if(!isset($_SESSION["user"])){
         header("location: index.php?c=auth&a=login ");
      }else{
        $data= $_POST['data'];
        $result= $this->model->CreateSite($data);
        header("Location: ?c=admin&a=AdminSite&msn=$result");
      }
    }

    //Funcion para eliminar sites en el sistema

    public function DeleteSite(){
      if(!isset($_SESSION["user"])){
         header("location: index.php?c=auth&a=login ");
      }else{
        $id= $_GET['id'];
        $result= $this->model->DeleteSite($id);
        header("Location: ?c=admin&a=AdminSite&msn=$result");
      }
    }

    //Funcion para ver las areas en el sistema

    public function AdminArea(){
      if(!isset($_SESSION["user"])){
         header("location: index.php?c=auth&a=login ");
      }else{
        require_once 'view/include/header.php';
        $result= $this->model->ReadAreabyAdmin();
        require_once 'view/modules/admin/adminArea.php';
        require_once 'view/include/footer.php';
      }
    }

    //Funcion para registrar areas en el sistema

    public function CreateArea(){
      if(!isset($_SESSION["user"])){
         header("location: index.php?c=auth&a=login ");
      }else{
        $data= $_POST['data'];
        $result= $this->model->CreateArea($data);
        header("Location: ?c=admin&a=AdminArea&msn=$result");
      }
    }

    //Funcion para eliminar areas en el sistema

    public function DeleteArea(){
      if(!isset($_SESSION["user"])){
         header("location: index.php?c=auth&a=login ");
      }else{
        $id= $_GET['id'];
        $result= $this->model->DeleteArea($id);
        header("Location: ?c=admin&a=AdminArea&msn=$result");
      }
    }

    //Funcion para ver cargos en el sistema

    public function AdminCargo(){
      if(!isset($_SESSION["user"])){
         header("location: index.php?c=auth&a=login ");
      }else{
        require_once 'view/include/header.php';
        $result= $this->model->ReadCargobyAdmin();
        require_once 'view/modules/admin/AdminCargo.php';
        require_once 'view/include/footer.php';
      }
    }

    //Funcion para registrar cargos en el sistema

    public function CreateCargo(){
      if(!isset($_SESSION["user"])){
         header("location: index.php?c=auth&a=login ");
      }else{
        $data= $_POST['data'];
        $result= $this->model->CreateCargo($data);
        header("Location: ?c=admin&a=AdminCargo&msn=$result");
      }
    }

    //Funcion para eliminar cargos en el sistema

    public function DeleteCargo(){
      if(!isset($_SESSION["user"])){
         header("location: index.php?c=auth&a=login ");
      }else{
        $id= $_GET['id'];
        $result= $this->model->DeleteCargo($id);
        header("Location: ?c=admin&a=AdminCargo&msn=$result");
      }
    }

    //Funcion para ver tipos de equipos en el sistema

    public function AdminTipo(){
      if(!isset($_SESSION["user"])){
         header("location: index.php?c=auth&a=login ");
      }else{
        require_once 'view/include/header.php';
        $result= $this->model->ReadTipobyAdmin();
        require_once 'view/modules/admin/AdminTipo.php';
        require_once 'view/include/footer.php';
      }
    }

    //Funcion para registrar tipos de equipos en el sistema

    public function CreateTipo(){
      if(!isset($_SESSION["user"])){
         header("location: index.php?c=auth&a=login ");
      }else{
        $data= $_POST['data'];
        $result= $this->model->CreateTipo($data);
        header("Location: ?c=admin&a=AdminTipo&msn=$result");
      }
    }

    //Funcion para elimiar tipos de equipos en el sistema

    public function DeleteTipo(){
      if(!isset($_SESSION["user"])){
         header("location: index.php?c=auth&a=login ");
      }else{
        $id= $_GET['id'];
        $result= $this->model->DeleteTipo($id);
        header("Location: ?c=admin&a=AdminTipo&msn=$result");
      }
    }

    //Funcion para ver marcas de equipos en el sistema

    public function AdminMarca(){
      if(!isset($_SESSION["user"])){
         header("location: index.php?c=auth&a=login ");
      }else{
        require_once 'view/include/header.php';
        $result= $this->model->ReadMarcabyAdmin();
        require_once 'view/modules/admin/adminMarca.php';
        require_once 'view/include/footer.php';
      }
    }

    //Funcion para registrar marcas de equipos en el sistema

    public function CreateMarca(){
      if(!isset($_SESSION["user"])){
         header("location: index.php?c=auth&a=login ");
      }else{
        $data= $_POST['data'];
        $result= $this->model->CreateMarca($data);
        header("Location: ?c=admin&a=AdminMarca&msn=$result");
      }
    }

    //Funcion para eliminar marcas de equipos en el sistema

    public function DeleteMarca(){
      if(!isset($_SESSION["user"])){
         header("location: index.php?c=auth&a=login ");
      }else{
        $id= $_GET['id'];
        $result= $this->model->DeleteMarca($id);
        header("Location: ?c=admin&a=AdminMarca&msn=$result");
      }
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //                                                                                                            //
    //                                      MODULO DE RECUPERAR CONTRASEÑA                                        //
    //                                                                                                            //
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //Funcion para ver el formulario de recuperar contraseña

    public function Clave(){
      require_once 'view/include/header.php';
      require_once 'view/modules/auth/recuperar.php';
      require_once 'view/include/footer.php';
    }

    //Funcion para ver la contraseña en pantalla

    public function Password(){
      $data= $_POST["data"];
      $result= $this->model->ReadPass($data);
      require_once 'view/include/header.php';
      require_once 'view/modules/auth/password.php';
      require_once 'view/include/footer.php';
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //                                                                                                            //
    //                                       MODULO DE CERRAR SESION                                              //
    //                                                                                                            //
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    // Metodo para cerrar sesion
    public function logout(){
        session_destroy();
        header("Location: Inicio");
    }

  }

?>
