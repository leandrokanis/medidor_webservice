<?php

  @session_start();
  include("app/collects_controller.php");
  $collects = new CollectsController();
  $content = $collects->index();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Index de Medições</title>
    <style>
    table {
      border-collapse: collapse;
    }

    table, th, td {
      border: 1px solid black;
      padding: 1em;
    }

    </style>
  </head>
  <body>

  <p>
    <?php if (isset($_SESSION['message'])) {
      echo $_SESSION['message'];
      unset($_SESSION['message']);
    } ?>
  </p>

  <table>
    <thead>
      <tr>
        <th>id</th>
        <th>date</th>
        <th>temp</th>
        <th>humd</th>
        <th></th>
      </tr>
    </thead>

    <tbody>
    <?php while ($row = $content->fetch_assoc()) {
      $temp = $row["temp"];
      $humd = $row["humd"];
      $id = $row["id"];
      $date = $row["date"];

      $line = "<tr>";
      $line .= "<td>" . $id . "</td>";
      $line .= "<td>" . $date . "</td>";
      $line .= "<td>" . $humd . "</td>";
      $line .= "<td>" . $temp . "</td>";
      $line .= "<td><a href=\"delete.php?id=" . $id . "\">deletar</a></td>";
      $line .= "</tr>";

      echo $line;
    } ?>
      </tbody>
    </table>

  </body>
</html>
