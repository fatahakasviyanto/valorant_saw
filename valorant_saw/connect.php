<?php

//kunci buat connect ke database
$dsn = "mysql:host=localhost;dbname=db_agent";
$kunci = new PDO($dsn, "root", "");
$kunci->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>