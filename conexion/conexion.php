<?php

	$mysqli = new MySQLi("localhost","root","102236","bd_cambios");

	if (!$mysqli) die ("Error al conectar con el servidor -> ".mysqli_error());
	mysqli_query ($mysqli,"SET NAMES 'utf8'");


?>