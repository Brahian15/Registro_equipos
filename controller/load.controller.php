<?php

require_once 'model/user.model.php';

class loadController{

  private $load;

  public function __CONSTRUCT(){
    $this->load = new UserModel();
  }

  public function LoadSite(){
    $data= $this->load->readSitebyUser();
    foreach ($data as $row){
      echo "<option value='".$row["no_site"]."'>".$row["nom_site"]."</option>";
    }
  }

  public function LoadArea(){
    $data= $this->load->readArea();
    foreach($data as $row){
      echo "<option value='".$row["no_area"]."'>".$row["nom_area"]."</option>";
    }
  }

  public function LoadCargo(){
    $data= $this->load->readCargo();
    foreach($data as $row){
      echo "<option value='".$row["no_cargo"]."'>".$row["nom_cargo"]."</option>";
    }
  }

  public function LoadTipo(){
    $data= $this->load->readTipo();
    foreach($data as $row){
      echo "<option value='".$row["no_tipo"]."'>".$row["nom_tipo"]."</option>";
    }
  }

  public function LoadMarca(){
    $data= $this->load->readMarca();
    foreach($data as $row){
      echo "<option value='".$row["no_marca"]."'>".$row["nom_marca"]."</option>";
    }
  }

  public function UpdateSite(){
    $data= $this->load->readSite();
    foreach($data as $row){
      echo "<input type='text' value='".$row["nom_site"]."'>";
    }
  }


}

?>
