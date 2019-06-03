<?php

include("./config/connection.php");

class Collect {

  public function __construct($temp, $humd) {
    $this->temp = $temp;
    $this->humd = $humd;
  }

  public function create(){
    $connection = new Connection();
    return $connection->save($this->temp, $this->humd);
  }

}

?>
