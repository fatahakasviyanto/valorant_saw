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

  $sql = "SELECT * FROM agents ORDER BY id ASC";
  $data = [];
  $hasil = $key->prepare($sql);
  $hasil->execute();

  while($row = $hasil->fetch()) {
    array_push($data, $row);
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <script src="function.js"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/style.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Play&display=swap" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    <title>Paloran</title>
    <link rel = "icon" href ="img/valorant_icon.jpg" type = "image/x-icon"> 
  </head>
  <body>
<!-- Just an image -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">

    <a class="navbar-brand" href="#">
      <img src="img/valorant_icon.jpg" width="30" height="30" alt="">
    </a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item active">
          <a class="nav-link button--border-cover" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link button--border-cover" href="agent.php">Agents</a>
        </li>
        <li class="nav-item">
          <a class="nav-link button--border-cover" href="maps.php">Maps</a>
        </li>
        <li class="nav-item">
          <a class="nav-link button--border-cover" href="guides.php">Guides</a>
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
<!--sidebar-->
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <br/>
    <br/>
    <br/>
    <a><b>Agents</b></a>
    <hr/>
    <a href="agent.php">Agents List</a>
    <div class="dropdown">
      <a span>Agents Calculator</span>
      <div class="dropdown-content">
      <a href="DssFragger.php">Fragger</a>
      <a href="DssSupport.php">Support</a>
      <a href="DssController.php">Controller</a>
      <a href="DssInitiator.php">Initiator</a>
    </div>
  </div>
  <a href="compare_agent.php">Agents Comparison</a>

  </div>
  <span style="font-size:30px;cursor:pointer;position:fixed;" onclick="openNav()">&#9776; Menu</span>
  <!--End of sidebar-->

    <div class="container">
      <div class="greetings">
      <img src="img/valorant1.png" class="img-responsive"/>
    </div>

    <div class="d-flex justify-content-around">

        <div class="dropdown" style="margin-bottom:5px;">
        <select id="dropdown1" class="form-select" aria-label="Default select example">
          <?php 
            $panjang = count($data);
            $i = 0;
            while($i < $panjang):
          ?>
            <option value=<?php echo $data[$i]["id"]; ?>><?php echo $data[$i]["nama_agent"]; ?></option>
          <?php 
            $i++;
            endwhile; 
          ?>
        </select>
        </div>

        <div class="dropdown" style="margin-bottom:5px;">
            <select id="dropdown2" class="form-select" aria-label="Default select example">
                <?php 
            $panjang = count($data);
            $i = 0;
            while($i < $panjang):
          ?>
            <option value=<?php echo $data[$i]["id"]; ?>><?php echo $data[$i]["nama_agent"]; ?></option>
          <?php 
            $i++;
            endwhile; 
          ?>
            </select>
        </div>

    </div>
    

    <div class="container text-dark">
      <div class="d-flex justify-content-around">
        <div id="agent-kiri">
          <img id="gambar" class="data" src=""/>
          <h4 class="data" id="nama" style="color:white;"></h4>

          <div class="progress" style="height:32px;">
            <div class="progress-bar"  role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="height:32px;"></div>
            <h5 class="data" id="blind"></h5>
          </div>
          <br/>
          <div class="progress" style="height:32px;">
            <div class="progress-bar" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="height:32px;"></div>
            <h5 class="data" id="selfheal"></h5>
          </div>
          <br/>
          <div class="progress" style="height:32px;">
            <div class="progress-bar" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="height:32px;"></div>
            <h5 class="data" id="escape"></h5>
          </div>
          <br/>
          <div class="progress" style="height:32px;">
            <div class="progress-bar" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="height:32px;"></div>
            <h5 class="data" id="aoe"></h5>
          </div>
          <br/>
          <div class="progress" style="height:32px;">
            <div class="progress-bar" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="height:32px;"></div>
            <h5 class="data" id="healteam"></h5>
          </div>
          <br/>
          <div class="progress" style="height:32px;">
            <div class="progress-bar" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="height:32px;"></div>
            <h5 class="data" id="slowmove"></h5>
          </div>
          <br/>
          <div class="progress" style="height:32px;">
            <div class="progress-bar" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="height:32px;"></div>
            <h5 class="data" id="enemydetect"></h5>
          </div>
          <br/>
          <div class="progress" style="height:32px;">
            <div class="progress-bar" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="height:32px;"></div>
            <h5 class="data" id="smoke"></h5>
          </div>
          <br/>
          <div class="progress" style="height:32px;">
            <div class="progress-bar" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="height:32px;"></div>
            <h5 class="data" id="teleport"></h5>
          </div>
        </div>

        <div class="tengah text-center" style="color:white">
        <button type="button" class="btn btn-danger" onclick="bandingkan()" style="margin-bottom:300px;">Compare</button>
            <h5>Blind</h5>
            <br/>
            <h5>Self Heal</h5>
            <br/>
            <h5>Escape</h5>
            <br/>
            <h5>AoE Damage</h5>
            <br/>
            <h5>Heal Teammates</h5>
            <br/>
            <h5>Slow Movement</h5>
            <br/>
            <h5>Enemy Detection</h5>
            <br/>
            <h5>Smoke</h5>
            <br/>
            <h5>Teleportation</h5>
            
        </div>

        <div id="agent-kanan">
          <img id="gambar" class="data" src=""/>
          <h5 class="data" id="nama" style="color:white;"></h5>

          <div class="progress" style="height:32px;">
            <div class="progress-bar" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="height:32px;"></div>
            <h5 class="data" id="blind"></h5>
          </div>
          <br/>
          <div class="progress" style="height:32px;">
            <div class="progress-bar" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="height:32px;"></div>
            <h5 class="data" id="selfheal"></h5>
          </div>
          <br/>
          <div class="progress" style="height:32px;">
            <div class="progress-bar" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="height:32px;"></div>
            <h5 class="data" id="escape"></h5>
          </div>
          <br/>
          <div class="progress" style="height:32px;">
            <div class="progress-bar" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="height:32px;"></div>
            <h5 class="data" id="aoe"></h5>
          </div>
          <br/>
          <div class="progress" style="height:32px;">
            <div class="progress-bar" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="height:32px;"></div>
            <h5 class="data" id="healteam"></h5>
          </div>
          <br/>
          <div class="progress" style="height:32px;">
            <div class="progress-bar" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="height:32px;"></div>
            <h5 class="data" id="slowmove"></h5>
          </div>
          <br/>
          <div class="progress" style="height:32px;">
            <div class="progress-bar" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="height:32px;"></div>
            <h5 class="data" id="enemydetect"></h5>
          </div>
          <br/>
          <div class="progress" style="height:32px;">
            <div class="progress-bar" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="height:32px;"></div>
            <h5 class="data" id="smoke"></h5>
          </div>
          <br/>
          <div class="progress" style="height:32px;">
            <div class="progress-bar" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="height:32px;"></div>
            <h5 class="data" id="teleport"></h5>
          </div>
        </div>
      </div>
    </div>

</div>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>

</body>
</html>