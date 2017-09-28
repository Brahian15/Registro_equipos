<?php
require_once 'model/user.model.php';

class AuthController{

  private $users;

  public function __CONSTRUCT(){
    $this->users = new UserModel();
  }

  public function login(){
     require_once 'view/include/header.php';
     require_once 'view/modules/auth/login.php';
     require_once 'view/include/footer.php';
  }

  public function validEmail(){
      $email[0] = $_POST["email"];
      $response = $this->users->readUserbyEmail($email);

      if(count($response[0])<=0){
        $return = array("El correo no existe en nuestra aplicación",false);
      }else{
        $return = array("",true);
      }
      echo json_encode($return);
  }

  public function notFoundMail(){
    $email[0]= $_POST["email"];
    $result = $this->users->readUserbyEmail($email);

    if(count($result['user_id'])<=0){
          $return = array("",true);
    }else{
      $return = array("Correo ya esta en uso",false);
    }
    echo json_encode($return);
    }

  public function userAuth(){
    $data[0] = $_POST["email"];
    $data[1] = $_POST["pass"];

    $userData = $this->users->readUserbyEmail($data);


    if(password_verify($data[1],$userData["acc_pass"])){
       $return = array(true,"Bienvenido al Sistema");

       //  Creamos las variables de Sesion
       $_SESSION["user"]["token"] = $userData["acc_token"];
       $_SESSION["user"]["code"]  = $userData["user_id"];
       $_SESSION["user"]["name"]  = $userData["user_name"];
       $_SESSION["user"]["lastn"] = $userData["user_lastname"];
       $_SESSION["user"]["email"] = $_POST["email"];

    }else{
       // $this->users->updateUserFail($data[0]);
       $return = array(false,"La contraseña no es la correcta");
    }

    echo json_encode($return);

  }
}
?>
