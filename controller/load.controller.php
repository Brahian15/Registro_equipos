<?php

require_once 'model/user.model.php';

class loadController{

  private $load;

  public function __CONSTRUCT(){
    $this->load = new UserModel();
  }

  public function LoadSite(){
    $data= $this->load->ReadSitebyUser();
    foreach ($data as $row){
      echo "<option value='".$row["no_site"]."'>".$row["nom_site"]."</option>";
    }
  }

  public function LoadArea(){
    $data= $this->load->ReadAreabyUser();
    foreach($data as $row){
      echo "<option value='".$row["no_area"]."'>".$row["nom_area"]."</option>";
    }
  }

  public function LoadCargo(){
    $data= $this->load->ReadCargobyUser();
    foreach($data as $row){
      echo "<option value='".$row["no_cargo"]."'>".$row["nom_cargo"]."</option>";
    }
  }

  public function LoadTipo(){
    $data= $this->load->ReadTipobyEqui();
    foreach($data as $row){
      echo "<option value='".$row["no_tipo"]."'>".$row["nom_tipo"]."</option>";
    }
  }

  public function LoadMarca(){
    $data= $this->load->ReadMarcabyEqui();
    foreach($data as $row){
      echo "<option value='".$row["no_marca"]."'>".$row["nom_marca"]."</option>";
    }
  }

  public function LoadRol(){
    $data= $this->load->ReadRol();
    foreach($data as $row){
      echo "<option value='".$row["no_rol"]."'>".$row["nom_rol"]."</option>";
    }
  }


}

?>
