<?php

class DatiClient
{

public function generate()
{
	$dati=[];
	// prendi l'ip
	$dati['remote_address'] =  $_SERVER['REMOTE_ADDR'];
	// prendi l'ora
	$dati['ora'] = $now= date('Y-i-d h-m-s');

	return (json_encode($dati));
}

public function extract ($string)
{
	$message= "";
	$var= json_decode($string, 1);
	if (is_array($var)){
		foreach($var as $key=>$val){
			$message .= $key . ":". $val . ";";

		}
	} else {

		$message = $var;
	}
	return $message;

}

}
