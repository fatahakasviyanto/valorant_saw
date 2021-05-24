<?php

session_start(); //start session

if(!isset($_SESSION['idacc']))
  {
      header("Location: login.php");
      exit;
  }

$a = "mysql:host=localhost;dbname=db_agent";
$b = "root";
$c = "";
$key = new PDO($a ,$b , $c);

$sql = "SELECT * FROM maps";

$hasil = $key->prepare($sql);
$hasil->execute();

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Play&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>List Maps</title>
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
<div class="container-fluid bg-dark text-white">

    <div class="container container-bobot">
                <a href="form_addMaps.php" class="btn btn-primary"><i class="bi bi-plus"></i> Add More Maps</a>
                <table class="table table-dark table-striped">
                <thead>
                    <tr>
                    <th width="10%">No</th>
                    <th width="10%">Map Name</th>
                    <th width="10%"></th>
                    <th width="10%">Action</th>
                    </tr>
                </thead>

                <?php 
                $i = 0;
                while($data = $hasil->fetch()): 
                $i++;?>
                    <tbody>
                    <tr>
                    <td><?= $i; ?></td>
                    <td><?= $data["titleMaps"]; ?></td>
                    <td><img class="card-img-top" src="<?php echo $data['imgMaps']; ?>" alt="Card image cap" style="width:65px;height:65px;object-fit: cover;"></td>

                    <td>
                        <a href="editMaps.php?id=<?= $data['id']; ?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                        <a href="deleteMapsProses.php?id=<?= $data['id']; ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                    </td>
                    
                    </tr>
                    </tbody>
                    <?php endwhile; ?>
                    </table>
                    <a href="landingPageAdmin.php" class="btn btn-danger"><i class="bi bi-chevron-bar-left"></i> Back</a>
    </div>
    <footer class="container-fluid py-5" style="text-align:center;">
      &copy; Fata 2021
    </footer>
</div>
