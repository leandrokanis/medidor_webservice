<?php

include("collect.php");

class CollectsController {

  public function create(){
    $temp = $_GET["temp"];
    $humd = $_GET["humd"];

    $collect = new Collect($temp, $humd);
    return $collect->create();

    // header("Location: index.php");
  }

}

?>
