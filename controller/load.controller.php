<?php

require_once 'model/user.model.php';

class loadController{

  private $load;

  public function __CONSTRUCT(){
    $this->load = new UserModel();
  }

  //Funcion para cargar los datos de los sites

  public function LoadSite(){
    $data= $this->load->ReadSitebyUser();
    foreach ($data as $row){
      echo "<option value='".$row["no_site"]."'>".$row["nom_site"]."</option>";
    }
  }

  //Funcion para cargar los datos de las areas

  public function LoadArea(){
    $data= $this->load->ReadAreabyUser();
    foreach($data as $row){
      echo "<option value='".$row["no_area"]."'>".$row["nom_area"]."</option>";
    }
  }

  //Funcion para ver los datos de los cargos

  public function LoadCargo(){
    $data= $this->load->ReadCargobyUser();
    foreach($data as $row){
      echo "<option value='".$row["no_cargo"]."'>".$row["nom_cargo"]."</option>";
    }
  }

  //Funcion para cargar los datos de los tipos del equipo

  public function LoadTipo(){
    $data= $this->load->ReadTipobyEqui();
    foreach($data as $row){
      echo "<option value='".$row["no_tipo"]."'>".$row["nom_tipo"]."</option>";
    }
  }

  //Funcion para cargar los datos de las marcas del equipo

  public function LoadMarca(){
    $data= $this->load->ReadMarcabyEqui();
    foreach($data as $row){
      echo "<option value='".$row["no_marca"]."'>".$row["nom_marca"]."</option>";
    }
  }

  //Funcion para cargar los datos de los roles del usuario

  public function LoadRol(){
    $data= $this->load->ReadRol();
    foreach($data as $row){
      echo "<option value='".$row["no_rol"]."'>".$row["nom_rol"]."</option>";
    }
  }


}

?>
