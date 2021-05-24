<?php

$a = "mysql:host=localhost;dbname=db_agent";
$b = "root";
$c = "";
$key = new PDO($a ,$b , $c);

$sql = "DELETE FROM agents
        WHERE id = ?";

$hasil = $key->prepare($sql);
$hasil->execute([$_GET['id']]); 

header('Location: adminAgentList.php');
