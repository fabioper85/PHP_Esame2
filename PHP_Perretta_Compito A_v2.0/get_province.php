<?php

include "config.php";
include "connessione.php";
include "functions.php";

$id_regione = $_GET['id_regione'];
// echo $id_regione;

$dbh = connect($dbData);

getProvince($dbh, $id_regione);

?>
