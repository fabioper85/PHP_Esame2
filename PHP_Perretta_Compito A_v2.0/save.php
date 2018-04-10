<?php

include "config.php";
include "connessione.php";
include "functions.php";
include "dati_client.php";

echo "<pre>";
print_r($_POST);

// Array
// (
//     [nome] => Favio
//     [cognome] => FÃ¬sjcks
//     [eta] => 32
//     [regione] => 11
//     [provincia] => IS
//     [comune] => ACQUAVIVA D'ISERNIA
//     [invia] =>
// )
//

$dbh = connect($dbData);
saveVisita($dbh, $_POST);
echo "Fatto!";
header('Location: index.php');
//
// save_data($_POST);

?>
