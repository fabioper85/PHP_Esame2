<?php

include "config.php";
include "connessione.php";
include "functions.php";

$debug = false;
$dbh = connect($dbData);
$query = $dbh->query('SELECT * FROM regioni');
$regioni = $query->fetchAll();
$visite = getVisite($dbh);

if($debug)
{
  echo "<pre>";
  // print_r($regioni);
  print_r($visite);
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PERRETTA_PHP_Esame 2</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="box">
      <div class="dati">
        <h1>Form di inserimento dati</h1>
        <form class="" action="save.php" method="post">
          <label for="nome" class="col-md-3">NOME</label>
          <input class="form-control col-md-12" type="text" name="nome" value="" id="nome"><br/>

          <label for="cognome"class="col-md-3">COGNOME</label>
          <input class="form-control col-md-12"type="text" name="cognome" value="" id="cognome"><br/>

          <label for="eta"class="col-md-3">ETA'</label>
          <input class="form-control col-md-12"type="text" name="eta" value="" id="eta"><br/>

          <h4 class="col-md-3">Residenza</h4>

          <select id="regione" class="form-control">
            <?php
              foreach ($regioni as $regione)
              echo "<option value=\"${regione['id']}\">${regione['nome']}</option>";
            ?>
          </select>
          <select id="provincia" class="form-control">
            <option value="">----------</option>
          </select>
          <select id="comune" class="form-control" name="comune_id">
            <option value="">----------</option>
          </select>

          <div class="clearfix"></div>
          <button type="submit" name="invia" class="btn btn-primary">INVIA DATI AL DATABASE</button>
        </form>
      </div>

      <div class="report">
        <?php printVisite($visite); ?>
      </div>
    </div>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script src="main.js"></script>
  </body>
</html>
