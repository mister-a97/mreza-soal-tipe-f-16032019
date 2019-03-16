<?php

	$servername 	= 'localhost';
	$username		= 'root';
	$password		= 'localhost10';
	$dbname			= 'mreza_sensus_penduduk_16032019';

	date_default_timezone_set('Asia/Jakarta');

	$connect_db		= mysqli_connect($servername, $username, $password, $dbname);

	if(!$connect_db) {

		die('Status Connection To Database: FAILED '.mysqli_connect_error());

	}

?>