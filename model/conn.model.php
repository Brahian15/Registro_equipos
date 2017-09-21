<?php

  class DataBase{
    private static $db_host = "localhost";
    private static $db_name = "prestamo_pc";
    private static $db_user = "root";
    private static $db_pass = "";

    private static $db_conn = null;

    public static function connect(){

      if(self::$db_conn ==null){
        try{
          self::$db_conn = new PDO("mysql:host=".self::$db_host.";dbname=".self::$db_name,self::$db_user,self::$db_pass);

          self::$db_conn->exec("SET CHARACTER SET utf8");

        }catch(PDOException $e){
          die($e->getMessage());
        }
      }
      return self::$db_conn;
    }
    public static function disconnet(){
      self::$db_conn = null;
    }

    public static function createLog($code, $text, $file, $line){
				 	$mylog = fopen("system.log","a");

					switch ($code) {
						case 'HY093':
								$text = "Los comodines y los parametros no coinciden revise bien";
							break;

						case '23000':
								$text = "Hay duplicidad de información, el PK ya existe";
						break;

						case '42S02':
								$text = "La tabla no existe o la escribio mal";
						break;
					}

					fwrite($mylog, date("Y-m-d h:i:s")." -- Error del Sistema: # ".$code." ".$text." En el archivo ".$file." --> ".$line."\r\n\r\n");
					fclose($mylog);
		}
  }



?>
