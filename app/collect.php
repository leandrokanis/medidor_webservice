<?php

include("collects_database.php");

class Collect {

  public function __construct($temp, $humd) {
    $this->temp = $temp;
    $this->humd = $humd;
  }

  public function create(){
    $connection = new Connection();
    return $connection->save($this->temp, $this->humd);
  }

  public static function destroy($id){
    $connection = new Connection();
    return $connection->destroy($id);
  }

}

?>
