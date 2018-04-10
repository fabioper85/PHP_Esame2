<?php

function getProvince($dbh, $id_regione)
{
  $query = $dbh->query("SELECT * FROM province WHERE id_regione=$id_regione");
  $province = $query->fetchAll();

  foreach ($province as $provincia)
  {
    echo "<option value=\"".$provincia['sigla']."\">".$provincia['nome']."</option>";
  }
}

function getComuni($dbh, $sigla_provincia)
{
  $query = $dbh->query("SELECT * FROM comuni WHERE sigla_provincia='$sigla_provincia'");
  $comuni = $query->fetchAll();

  foreach ($comuni as $comune)
  {
    print_r($comune);
    echo "<option value=\"".$comune['nome']."\">".$comune['nome']."</option>";
  }
}
?>
