<?php
  include("config/connect.php");

  $connection = new Connection();
  $link = $connection->connect();

  $temp = $_GET["temp"];
  $humd = $_GET["humd"];

  $query = "INSERT INTO `dth22` (`temp`, `humd`) VALUES ($temp, $humd);";

  mysqli_query($link, $query);
  mysqli_close($link);

  header("Location: index.php");
?>
