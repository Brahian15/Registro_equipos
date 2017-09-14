<?php
  require_once 'model/user.model.php';
  require_once 'load.controller.php';

  class AdminController{

    private $model;
    private $load;

    public function __CONSTRUCT(){
      $this->model = new UserModel();
      $this->load = new LoadController();
    }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Modulo de usuario
    public function index(){
      require_once 'view/include/header.php';
      $result = $this->model->ReadUser();
      require_once 'view/modules/admin/readUser.php';
      require_once 'view/include/footer.php';
    }

    public function User(){
      require_once 'view/include/header.php';
      require_once 'view/modules/admin/user.php';
      require_once 'view/include/footer.php';
    }

    public function ReadUser(){
      require_once 'view/include/header.php';
      $result = $this->model->ReadUser();
      require_once 'view/modules/admin/readUser.php';
      require_once 'view/include/footer.php';
    }

    public function DetalleUser(){
      require_once 'view/include/header.php';
      $detalle = $_GET['detalle'];
      $result = $this->model->DetalleUser($detalle);
      require_once 'view/modules/admin/detalleUser.php';
      require_once 'view/include/footer.php';
    }

    public function UpdateUser(){
      $data = $_POST['data'];
      $result = $this->model->UpdateUser($data);
      header("Location: ?c=admin&a=index&msn=$result");
    }

    public function CreateUser(){
      $data = $_POST["data"];
      $result = $this->model->CreateUser($data);
      header("Location: ?c=admin&a=User&msn=$result");
    }

    public function DeleteUser(){
      $id = $_GET['id'];
      $result = $this->model->DeleteUser($id);
      header("Location: ?c=admin&a=index&msn=$result");
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    // Modulo de equipo

    Public function Equipo(){
      require_once 'view/include/header.php';
      require_once 'view/modules/admin/equipo.php';
      require_once 'view/include/footer.php';
    }

    public function CreateEqui(){
      $data = $_POST["data"];
      $result = $this->model->CreateEqui($data);
      header("Location: ?c=admin&a=equipo&msn=$result");
    }

    public function ReadEqui(){
      require_once 'view/include/header.php';
      $result = $this->model->ReadEqui();
      require_once 'view/modules/admin/readEqui.php';
      require_once 'view/include/footer.php';

    }

    public function DetalleEqui(){
      require_once 'view/include/header.php';
      $detalle = $_GET['detalle'];
      $result = $this->model->DetalleEqui($detalle);
      require_once 'view/modules/admin/detalleEqui.php';
      require_once 'view/include/footer.php';
    }

    public function UpdateEqui(){
      $data = $_POST['data'];
      $result = $this->model->UpdateEqui($data);
      header("Location: ?c=admin&a=ReadEqui&msn=$result");
    }

    public function DeleteEqui(){
      $id = $_GET['id'];
      $result = $this->model->DeleteEqui($id);
      header("Location: index.php?c=admin&a=ReadEqui&msn=$result");
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    // Modulo de asigancion

    public function Asignacion(){
      require_once 'view/include/header.php';
      require_once 'view/modules/admin/asignacion.php';
      require_once 'view/include/footer.php';
    }

    public function CreateAsig(){
      $data = $_POST["data"];
      $result = $this->model->CreateAsig($data);
      header("Location: ?c=admin&a=Asignacion&msn=$result");
    }

    public function ReadAsig(){
      require_once 'view/include/header.php';
      $result = $this->model->ReadAsig();
      require_once 'view/modules/admin/readAsig.php';
      require_once 'view/include/footer.php';
    }

    public function SearchAsig(){
      require_once 'view/include/header.php';
      $serial= $_GET["serial"];
      $result= $this->model->SearchAsigbyEqui($serial);
      require_once 'view/modules/admin/readAsig.php';
      require_once 'view/include/footer.php';
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    // Modulo de devolucion

    public function ReadDev(){
      require_once 'view/include/header.php';
      $Devolucion= $_GET['Devolucion'];
      $result = $this->model->ReadDev($Devolucion);
      require_once 'view/modules/admin/ReadDev.php';
      require_once 'view/include/footer.php';
    }

    public function CreateDev(){
      $data = $_POST["data"];
      $result = $this->model->CreateDev($data);
      header("Location: index.php?c=admin&a=ReadAsig&msn=$result");
    }

    public function ReadHis(){
      require_once 'view/include/header.php';
      $result = $this->model->ReadHis();
      require_once 'view/modules/admin/historial.php';
      require_once 'view/include/footer.php';
    }

    public function DeleteDev(){
      $id = $_GET['id'];
      $result = $this->model->DeleteDev($id);
      header("Location: ?c=admin&a=ReadHis&msn=$result");
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //Modulo de administrar listas

    public function AdminSite(){
      require_once 'view/include/header.php';
      $result= $this->model->readSitebyAdmin();
      require_once 'view/modules/admin/adminSite.php';
      require_once 'view/include/footer.php';
    }

    public function CreateSite(){
      $data= $_POST['data'];
      $result= $this->model->CreateSite($data);
      header("Location: ?c=admin&a=AdminSite");
    }

    public function DeleteSite(){
      $id= $_GET['id'];
      $result= $this->model->DeleteSite($id);
      header("Location: ?c=admin&a=AdminSite&msn=$result");
    }

    public function AdminArea(){
      require_once 'view/include/header.php';
      require_once 'view/modules/admin/adminArea.php';
      require_once 'view/include/footer.php';
    }

    public function AdminCargo(){
      require_once 'view/include/header.php';
      require_once 'view/modules/admin/adminCargo.php';
      require_once 'view/include/footer.php';
    }

    public function AdminTipo(){
      require_once 'view/include/header.php';
      require_once 'view/modules/admin/AdminTipo.php';
      require_once 'view/include/footer.php';
    }

    public function AdminMarca(){
      require_once 'view/include/header.php';
      require_once 'view/modules/admin/adminMarca.php';
      require_once 'view/include/footer.php';
    }

  }

?>
