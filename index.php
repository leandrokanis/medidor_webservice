<?php

include("app/collects_controller.php");

header('Content-Type: application/json');
$collects = new CollectsController();
echo json_encode($collects->index());

?>
