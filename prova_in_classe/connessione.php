<?php

function connect(){
	try
	{
		static $db;
		if (!isset($db))
		{
			$db = new PDO('mysql:host=localhost;dbname=esame2;charset=utf8mb4', 'esame2', 'segreta');
		}
		return $db;
	}
	catch (PDOException $e)
	{
	  echo "ERRORE!" . $e->getMessage() . "<br/>";
	  die();
	}
}

?>
