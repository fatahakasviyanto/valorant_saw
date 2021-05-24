<?php

$a = "mysql:host=localhost;dbname=db_agent";
$b = "root";
$c = "";
$key = new PDO($a ,$b , $c);

$sql ="SELECT * FROM bobotsupport
        WHERE id=?";

$hasil= $key->prepare($sql);
$hasil->execute([$_GET['id']]); 

$row= $hasil->fetch();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/style.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Play&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>List Bobot</title>
    <link rel = "icon" href ="img/valorant_icon.jpg" type = "image/x-icon"> 
  </head>
  <style>
      body {
          background-color:#212529;
      }
    </style>
  <body>
<!-- Just an image -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">
    <img src="img/valorant_icon.jpg" width="30" height="30" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
        <a class="nav-link button--border-cover" href="landingPageAdmin.php">Home</a>
      </li>
      <!--<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>-->
    </ul>
  </div>
</nav>

<!-- First Container -->
<div class="container-fluid bg-dark">
  <div class="container">

    <h1>Ubah Data Menu</h1>
    <form action="editProsesBobotSupport.php" method='post'>

    <div class="form-group">
    Nama:
    <input type="text" class="form-control" name="namaBobot" value="<?= $row ['namaBobot']?>"/>
    </div>

    <div class="form-group">
    Tipe:
    <input type="text" class="form-control" name="tipeBobot" value="<?= $row ['tipeBobot']?>"/>
    </div>

    <div class="form-group">
    Bobot:
    <input type="number" class="form-control" name="bobot" value="<?= $row ['bobot']?>"/>
    </div>

    <input type="hidden" name='id' value="<?= $row ['id']?>"/>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="formListBobot.php" class="btn btn-secondary">Cancel</a>

    </form>

  </div>
</div>