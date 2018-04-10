<?php

include "config.php";
include "connessione.php";
include "functions.php";

$sigla_provincia = $_GET['sigla_provincia'];
// echo $sigla_provincia;

$dbh = connect($dbData);

getComuni($dbh, $sigla_provincia);

?>
