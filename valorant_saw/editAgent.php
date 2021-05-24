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

$sql ="SELECT * FROM agents
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

    <title>Insert Agents</title>
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
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item active">
          <a class="nav-link button--border-cover" href="landingPageAdmin.php">Home</a>
        </li>
      </ul>
      <form class="d-flex">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
              Hi, <?php echo $_SESSION['usernameacc'] ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
        </li>
      </ul>
      </form>
    </div>

</nav>

<!-- First Container -->
<div class="container-fluid bg-dark text-white">

    <div class="container">

      <div class="section1">

        <div class="col-md-3">
          <h4 class="featurette-heading"><img src="img/valorant_icon.jpg" width="30" height="30" alt=""> Edit Agent Data</h4>
        </div>
        <hr class="featurette-divider">
        
        <form action="editProsesAgent.php" method="post" enctype="multipart/form-data">
        
        <div class="form-group">
        Name:
        <input type="text" class="form-control" name="nama_agent" value="<?= $row ['nama_agent']?>"/>
        </div>
        <div class="form-group">
        Description:
        <textarea class="form-control" rows="4" name="description_agent"><?= $row ['description_agent']?></textarea>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                Blind Ability:
                <input type="number" min="0" step="1" class="form-control" name="blind" value="<?= $row ['blind']?>"/>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                Self-Heal Ability:
                <input type="number" min="0" step="1" class="form-control" name="self_heal" value="<?= $row ['self_heal']?>"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                Escape Ability:
                <input type="number" min="0" step="1" class="form-control" name="escape" value="<?= $row ['escape']?>"/>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                AoE Damage Ability:
                <input type="number" min="0" step="1" class="form-control" name="aoe" value="<?= $row ['aoe']?>"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                Heal Teammate Ability:
                <input type="number" min="0" step="1" class="form-control" name="heal_team" value="<?= $row ['heal_team']?>"/>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                Slow Enemy Movement Ability:
                <input type="number" min="0" step="1" class="form-control" name="slow_move" value="<?= $row ['slow_move']?>"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                Enemy Detection Ability:
                <input type="number" min="0" step="1" class="form-control" name="enemy_detect" value="<?= $row ['enemy_detect']?>"/>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                Smoke/Map Separator Ability:
                <input type="number" min="0" step="1" class="form-control" name="smoke" value="<?= $row ['smoke']?>"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                Teleport Ability:
                <input type="number" min="0" step="1" class="form-control" name="teleport" value="<?= $row ['teleport']?>"/>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                Image:
                <input type="file" accept="image/*" name="img" />
                </div>
            </div>
            <input type="hidden" name='id' value="<?= $row ['id']?>"/>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="adminAgentList.php" class="btn btn-danger"><i class="bi bi-x"></i> Cancel</a>

        </form>

      </div>
      
    </div>
    <footer class="container-fluid py-5" style="text-align:center;">
      &copy; Fata 2021
    </footer>
</div> 
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  </body>
</html>