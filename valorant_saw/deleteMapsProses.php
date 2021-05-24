<?php

$a = "mysql:host=localhost;dbname=db_agent";
$b = "root";
$c = "";
$key = new PDO($a ,$b , $c);

$sql = "DELETE FROM maps
        WHERE id = ?";

$hasil = $key->prepare($sql);
$hasil->execute([$_GET['id']]); 

header('Location: adminMapsList.php');
