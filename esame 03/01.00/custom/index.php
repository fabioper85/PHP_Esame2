<?php

include "include/getConnection.php";
include "include/functions.php";

$db = connect($dbData);
$sensori = getSensori($db);

// echo "<pre>";
// print_r($sensori);

?>

<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <title>PHP_Esame3_3BMeteo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300i,700|Raleway:400,400i,500,500i,700,700i|Roboto+Condensed:400,400i,700,700i|Roboto:300i,400,400i,700,700i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">3BMeteo</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <!-- <li class="nav-item active">
            <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li> -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Control Manager
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="../cake/3BMeteo/sensors" target="_blank">Sensors</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Samples</a>
            </div>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li> -->
        </ul>
        <!-- <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> -->
      </div>
    </nav>
    <div class="container-fluid">
      <div class="jumbotron">
        <h1 class="display-4">3BMeteo</h1>
        <p class="lead"><i>The best way to check the weather on the line</i></p>
        <p>by <a href="http://www.facebook.com/fabio.broad.mod" target="_blank">Fabio Perretta</a></p>
        <!-- <p class="lead">
          <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </p> -->
      </div>
    </div>
    <div class="container" id="sensors-box">
      <div class="activeSensorsBox">
        <h5>Sensori attivi</h5>
          <?php
            printSensoriAttivi($sensori);
          ?>
      </div>
      <div class="inactiveSensorsBox">
        <h5>Sensori non attivi</h5>
          <?php
            printSensoriNonAttivi($sensori);
          ?>
      </div>
    </div>
    <script src="main.js" type="text/javascript"></script>
  </body>
</html>
