<?php

include "connessione.php";

$debug = false;
$dbh = connect();
$query = $dbh->query('SELECT * FROM regioni');
$regioni = $query->fetchAll();

if($debug)
{
  echo "<pre>";
  print_r($regioni);
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PERRETTA_PHP_Esame 2</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
  </head>
  <body>
    <div class="container">
      <h1>Form di inserimento dati</h1>
      <form class="" action="result.php" method="post">
        <div class="form-group">
          <label for="nome" class="col-md-3">NOME</label>
          <input class="form-control col-md-12" type="text" name="nome" value="" id="nome"><br/>

          <label for="cognome"class="col-md-3">COGNOME</label>
          <input class="form-control col-md-12"type="text" name="cognome" value="" id="cognome"><br/>

          <label for="eta"class="col-md-3">ETA'</label>
          <input class="form-control col-md-12"type="text" name="eta" value="" id="eta"><br/>

          <h4 class="col-md-3">Residenza</h4>

          <select id="regione" class="form-control" name="regione">
            <?php foreach ($regioni as $regione)
              echo "<option value=\"${regione['id']}\">${regione['nome']}</option>";
            ?>
          </select>
          <select id="provincia" class="form-control" name="provincia">
            <option value="">----------</option>
          </select>
          <select id="comune" class="form-control" name="comune">
            <option value="">----------</option>
          </select>

          <div class="clearfix"></div>
        </div>
        <button type="submit" name="invia" class="btn btn-primary">INVIA DATI AL DATABASE</button>
      </form>
    </div>

    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script src="main.js"></script>
  </body>
</html>
