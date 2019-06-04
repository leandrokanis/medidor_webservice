<?php

include("app/collects_controller.php");

if (!session_id()) {
  session_start();
}

header('Content-Type: application/json');
$collects = new CollectsController();
$_SESSION['message'] = $collects->delete();
header('Location: index.php');

?>
