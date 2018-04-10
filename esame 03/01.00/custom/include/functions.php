<?php

function getSensori($db)
{
  $dbh = $db->query("SELECT * FROM sensors");
  $result = $dbh->fetchAll();
  return $result;
}

function printSensoriAttivi($sensori)
{
  if(count($sensori) > 0)
  {
    $count = 0;
    foreach ($sensori as $sensore) {
      if($sensore['active'] == 1)
      {
        $count++;
      }
    }

    if($count > 0)
    {
      foreach ($sensori as $sensore) {
        if($sensore['active'] == 1)
        {
          echo "<table class='table table-hover'>";
          echo "<thead>";
          echo "<tr>";
          echo "<th scope='col'>Id Sensore</th>";
          echo "<th scope='col'>Codice sensore</th>";
          echo "<th scope='col'>Location</th>";
          echo "<th scope='col' class='text-center'>Azioni</th>";
          echo "<th scope='col' class='text-center'>Info Sensore</th>";
          echo "</tr>";
          echo "</thead>";
          echo "<tbody>";
          echo "<tr>";
          echo "<td class='sensor_id'>".$sensore['id']."</td>";
          echo "<td>".$sensore['code']."</td>";
          echo "<td>".$sensore['location']."</td>";
          echo "<td class='text-center'><button class='btn btn-danger ajaxBtn' value='".$sensore['id']."'>Disattiva</button></td>";
          echo "<td class='text-center'><button class='btn btn-primary mostraInfo'>mostra</button></td>";
          echo "</tr>";
          echo "</tbody>";
          echo "</table>";
        }
      }
    }
    else
    {
      echo "<p>Non sono presenti sensori attivi!</p>";
    }
  }
}

function printSensoriNonAttivi($sensori)
{
  if(count($sensori) > 0)
  {
    $count = 0;
    foreach ($sensori as $sensore) {
      if($sensore['active'] == 0)
      {
        $count++;
      }
    }

    if($count > 0)
    {
      foreach ($sensori as $sensore) {
        if($sensore['active'] == 0)
        {
          echo "<table class='table table-hover'>";
          echo "<thead>";
          echo "<tr>";
          echo "<th scope='col'>Id Sensore</th>";
          echo "<th scope='col'>Codice sensore</th>";
          echo "<th scope='col'>Location</th>";
          echo "<th scope='col' class='text-center'>Azioni</th>";
          echo "<th scope='col' class='text-center'>Info Sensore</th>";
          echo "</tr>";
          echo "</thead>";
          echo "<tbody>";
          echo "<tr>";
          echo "<td>".$sensore['id']."</td>";
          echo "<td>".$sensore['code']."</td>";
          echo "<td>".$sensore['location']."</td>";
          echo "<td class='text-center'><button class='btn btn-success ajaxBtn' value='".$sensore['id']."'>Attiva</button></td>";
          echo "<td class='text-center'><button class='btn btn-primary mostraInfo'>mostra</button></td>";
          echo "</tr>";
          echo "</tbody>";
          echo "</table>";
        }
      }
    }
    else
    {
      echo "<p>Non sono presenti sensori inattivi!</p>";
    }
  }
}

?>
