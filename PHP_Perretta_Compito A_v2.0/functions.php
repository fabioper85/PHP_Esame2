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
    echo "<option value=\"".$comune['id']."\">".$comune['nome']."</option>";
  }
}

function saveVisita($dbh, $dati){
	// estrazione dei dati
	// devo usare prepare:
	$stmt= $dbh->prepare("INSERT INTO `visite` ( `nome`, `cognome`, `eta`, `comune_id`, `info`) VALUES ( :nome, :cognome, :eta, :comune_id, :info)");
	$stmt->bindValue(':nome',$dati['nome']);
  $stmt->bindValue(':cognome',$dati['cognome']);
  $stmt->bindValue(':eta',$dati['eta']);
	$stmt->bindValue(':comune_id',$dati['comune_id']);
	$stmt->bindValue(':info',DatiClient::generate());
	$stmt->execute();
}

function getVisite($dbh){
	// estrazione dei dati
	// devo usare prepare:
	$listaVisite= $dbh->prepare("SELECT v.*, c.nome as comune FROM visite  v left join comuni  c on v.comune_id = c.id");
	$listaVisite->execute();
	// prendo i result set come array associativo
	return $listaVisite->fetchAll();
}

function printVisite($visite)
{
  if(count($visite)<1)
  {
    echo "<p class='emptyDb'>Database vuoto! Inserisci dati per popolarlo</p>";
  }
  else
  {
    echo "<table class='table'>
      <tr>
        <th>Id visita</th><th>Nome</th><th>Cognome</th><th>Età</th><th>Comune(Id)</th><th>Nome comune</th><th>Info</th>
      </tr>";
    foreach ($visite as $visita) {
      echo "<tr>";
      echo "<td>".$visita['id_visita']."</td>";
      echo "<td>".$visita['nome']."</td>";
      echo "<td>".$visita['cognome']."</td>";
      echo "<td>".$visita['eta']."</td>";
      echo "<td>".$visita['comune_id']."</td>";
      echo "<td>".$visita['comune']."</td>";
      echo "<td class='info-box'><a href='#'>mostra</a><p>".$visita['info']."</p></td>";
      echo "</tr>";
    }
    echo "</table>";
  }
}
?>
