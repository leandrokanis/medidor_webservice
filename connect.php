<?php
 function Connection(){
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
?>
