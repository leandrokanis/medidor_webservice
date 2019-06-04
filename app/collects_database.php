<?php

class Connection {

   public function connect(){
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASSWORD", "");
    define("DB_DATABASE", "engemate");

    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

    if (!$connection) {
      echo "<p>Could not connect to the server '" . DB_USER . "'</p>\n";
      die('MySQL ERROR: ' . mysqli_error());
    }

    mysqli_select_db($connection, DB_DATABASE) or die( 'MySQL ERROR: '. mysqli_error() );
    return $connection;
   }

   public function save($temp, $humd){
     $link = $this->connect();
     $query = "INSERT INTO `dth22` (`temp`, `humd`) VALUES ($temp, $humd);";
     mysqli_query($link, $query);
     $last_id = mysqli_insert_id($link);
     $obj = $link->query("SELECT * FROM `dth22` WHERE id = $last_id;")->fetch_object();
     mysqli_close($link);
     return $obj;
   }

   public function show($id){
     $link = $this->connect();
     $query = "SELECT * FROM `dth22` WHERE id = $id;";
     $obj = mysqli_query($link, $query);
     mysqli_close($link);
     return $obj;
   }

   public function destroy($id){
     $link = $this->connect();
     $query = "DELETE FROM `dth22` WHERE `dth22`.`id` = $id;";
     if(mysqli_query($link, $query)){
       $message = "Medição " . $id . " foi removida";
     }
     mysqli_close($link);
     return $message;
   }

   public function index(){
     $link = $this->connect();
     $result = $link->query("SELECT * FROM `dth22`;");
     mysqli_close($link);
     return $result;
   }

}

?>
