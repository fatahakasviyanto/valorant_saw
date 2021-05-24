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

$sql = "SELECT * FROM bobotfragger";

$hasil = $key->prepare($sql);
$hasil->execute();

$sql2 = "SELECT * FROM bobotsupport";

$hasil2 = $key->prepare($sql2);
$hasil2->execute();

$sql3 = "SELECT * FROM bobotcontroller";

$hasil3 = $key->prepare($sql3);
$hasil3->execute();

$sql4 = "SELECT * FROM bobotinitiator";

$hasil4 = $key->prepare($sql4);
$hasil4->execute();

$sql5 = "SELECT * FROM agents ORDER BY nama_agent";

$hasil5 = $key->prepare($sql5);
$hasil5->execute();

    $i = 0;
    while($data = $hasil->fetch()): 
    $i++;

    $fragger_blind[$i] = $data["bobot"];
    $fragger_self_healing[$i] = $data["bobot"];
    $fragger_escape[$i] = $data["bobot"];
    $fragger_aoe[$i] = $data["bobot"];
    $fragger_healing[$i] = $data["bobot"];
    $fragger_slow[$i] = $data["bobot"];
    $fragger_enemydetect[$i] = $data["bobot"];
    $fragger_smoke[$i] = $data["bobot"];
    $fragger_teleport[$i] = $data["bobot"];

endwhile;

    $bobot_fragger = array($fragger_blind[1],$fragger_self_healing[2],$fragger_escape[3],$fragger_aoe[4],$fragger_healing[5],$fragger_slow[6],$fragger_enemydetect[7],
    $fragger_smoke[8],$fragger_teleport[9]);

    $i = 0;
    while($data = $hasil2->fetch()): 
    $i++;

    $support_blind[$i] = $data["bobot"];
    $support_self_healing[$i] = $data["bobot"];
    $support_escape[$i] = $data["bobot"];
    $support_aoe[$i] = $data["bobot"];
    $support_healing[$i] = $data["bobot"];
    $support_slow[$i] = $data["bobot"];
    $support_enemydetect[$i] = $data["bobot"];
    $support_smoke[$i] = $data["bobot"];
    $support_teleport[$i] = $data["bobot"];

endwhile;

    $bobot_support = array($support_blind[1],$support_self_healing[2],$support_escape[3],$support_aoe[4],$support_healing[5],$support_slow[6],$support_enemydetect[7],
    $support_smoke[8],$support_teleport[9]);

    $i = 0;
    while($data = $hasil3->fetch()): 
    $i++;

    $controller_blind[$i] = $data["bobot"];
    $controller_self_healing[$i] = $data["bobot"];
    $controller_escape[$i] = $data["bobot"];
    $controller_aoe[$i] = $data["bobot"];
    $controller_healing[$i] = $data["bobot"];
    $controller_slow[$i] = $data["bobot"];
    $controller_enemydetect[$i] = $data["bobot"];
    $controller_smoke[$i] = $data["bobot"];
    $controller_teleport[$i] = $data["bobot"];

endwhile;

    $bobot_controller = array($controller_blind[1],$controller_self_healing[2],$controller_escape[3],$controller_aoe[4],$controller_healing[5],$controller_slow[6],$controller_enemydetect[7],
    $controller_smoke[8],$controller_teleport[9]);

    $i = 0;
    while($data = $hasil4->fetch()): 
    $i++;

    $initiator_blind[$i] = $data["bobot"];
    $initiator_self_healing[$i] = $data["bobot"];
    $initiator_escape[$i] = $data["bobot"];
    $initiator_aoe[$i] = $data["bobot"];
    $initiator_healing[$i] = $data["bobot"];
    $initiator_slow[$i] = $data["bobot"];
    $initiator_enemydetect[$i] = $data["bobot"];
    $initiator_smoke[$i] = $data["bobot"];
    $initiator_teleport[$i] = $data["bobot"];

endwhile;

    $bobot_initiator = array($initiator_blind[1],$initiator_self_healing[2],$initiator_escape[3],$initiator_aoe[4],$initiator_healing[5],$initiator_slow[6],$initiator_enemydetect[7],
    $initiator_smoke[8],$initiator_teleport[9]);

    $i = 0;
    while($data = $hasil5->fetch()): 
    $i++;

    $nama_agent[$i] = $data["nama_agent"];
    $agent_description[$i] = $data["description_agent"];
    $agent_blind[$i] = $data["blind"];
    $agent_self_healing[$i] = $data["self_heal"];
    $agent_escape[$i] = $data["escape"];
    $agent_aoe[$i] = $data["aoe"];
    $agent_healing[$i] = $data["heal_team"];
    $agent_slow[$i] = $data["slow_move"];
    $agent_enemydetect[$i] = $data["enemy_detect"];
    $agent_smoke[$i] = $data["smoke"];
    $agent_teleport[$i] = $data["teleport"];
    $agent_imagefoto[$i] = $data["imagefoto"];

endwhile;

    $total = count($nama_agent);
    // $max_blind   = max($agent_blind);
    // $max_self_healing   = max($agent_self_healing);
    // $max_escape   = max($agent_escape);
    // $max_aoe  = max($agent_aoe);
    // $max_healing  = max($agent_healing);
    // $max_slow  = max($agent_slow);
    // $max_enemydetect  = max($agent_enemydetect);
    // $max_smoke  = max($agent_smoke);
    // $max_teleport  = max($agent_teleport);

    // $min_blind   = min($agent_blind);
    // $min_self_healing   = min($agent_self_healing);
    // $min_escape   = min($agent_escape);
    // $min_aoe  = min($agent_aoe);
    // $min_healing  = min($agent_healing);
    // $min_slow  = min($agent_slow);
    // $min_enemydetect  = min($agent_enemydetect);
    // $min_smoke  = min($agent_smoke);
    // $max_teleport  = max($agent_teleport);
    
    for($v=1;$v<=$total;$v++)
    {        
      $max[$v]      =  max($agent_blind[$v],$agent_self_healing[$v],$agent_escape[$v],$agent_aoe[$v],$agent_healing[$v],$agent_slow[$v],$agent_enemydetect[$v],$agent_smoke[$v],$agent_teleport[$v]);
      $min[$v]      =  min($agent_blind[$v],$agent_self_healing[$v],$agent_escape[$v],$agent_aoe[$v],$agent_healing[$v],$agent_slow[$v],$agent_enemydetect[$v],$agent_smoke[$v],$agent_teleport[$v]); 
    }

    for($v=1;$v<=$total;$v++)
    {        
      $N_agent_blind[$v]      =  ($agent_blind[$v] - $min[$v]) / ($max[$v] - $min[$v]);
      $N_agent_self_healing[$v]      =  ($agent_self_healing[$v] - $min[$v]) / ($max[$v] - $min[$v]);
      $N_agent_escape[$v]      =  ($agent_escape[$v] - $min[$v]) / ($max[$v] - $min[$v]);
      $N_agent_aoe[$v]      =  ($agent_aoe[$v] - $min[$v]) / ($max[$v] - $min[$v]);
      $N_agent_healing[$v]      =  ($agent_healing[$v] - $min[$v]) / ($max[$v] - $min[$v]);
      $N_agent_slow[$v]      =  ($agent_slow[$v] - $min[$v]) / ($max[$v] - $min[$v]);
      $N_agent_enemydetect[$v]      =  ($agent_enemydetect[$v] - $min[$v]) / ($max[$v] - $min[$v]);
      $N_agent_smoke[$v]      =  ($agent_smoke[$v] - $min[$v]) / ($max[$v] - $min[$v]);
      $N_agent_teleport[$v]      =  ($agent_teleport[$v] - $min[$v]) / ($max[$v] - $min[$v]);
    }  
  

    for($v=1;$v<=$total;$v++)
    {        
      $vop_blind_fragger[$v] = $N_agent_blind[$v] * $bobot_fragger[0];
      $vop_self_healing_fragger[$v] = $N_agent_self_healing[$v] * $bobot_fragger[1];
      $vop_escape_fragger[$v] = $N_agent_escape[$v] * $bobot_fragger[2];
      $vop_aoe_fragger[$v] = $N_agent_aoe[$v] * $bobot_fragger[3];
      $vop_healing_fragger[$v] = $N_agent_healing[$v] * $bobot_fragger[4];
      $vop_slow_fragger[$v] = $N_agent_slow[$v] * $bobot_fragger[5];
      $vop_enemydetect_fragger[$v] = $N_agent_enemydetect[$v] * $bobot_fragger[6];
      $vop_smoke_fragger[$v] = $N_agent_smoke[$v] * $bobot_fragger[7];
      $vop_teleport_fragger[$v] = $N_agent_teleport[$v] * $bobot_fragger[8];
      
    }

    for($v=1;$v<=$total;$v++)
    {        
      $vop_blind_support[$v] = $N_agent_blind[$v] * $bobot_support[0];
      $vop_self_healing_support[$v] = $N_agent_self_healing[$v] * $bobot_support[1];
      $vop_escape_support[$v] = $N_agent_escape[$v] * $bobot_support[2];
      $vop_aoe_support[$v] = $N_agent_aoe[$v] * $bobot_support[3];
      $vop_healing_support[$v] = $N_agent_healing[$v] * $bobot_support[4];
      $vop_slow_support[$v] = $N_agent_slow[$v] * $bobot_support[5];
      $vop_enemydetect_support[$v] = $N_agent_enemydetect[$v] * $bobot_support[6];
      $vop_smoke_support[$v] = $N_agent_smoke[$v] * $bobot_support[7];
      $vop_teleport_support[$v] = $N_agent_teleport[$v] * $bobot_support[8];
      
    }

    for($v=1;$v<=$total;$v++)
    {        
      $vop_blind_controller[$v] = $N_agent_blind[$v] * $bobot_controller[0];
      $vop_self_healing_controller[$v] = $N_agent_self_healing[$v] * $bobot_controller[1];
      $vop_escape_controller[$v] = $N_agent_escape[$v] * $bobot_controller[2];
      $vop_aoe_controller[$v] = $N_agent_aoe[$v] * $bobot_controller[3];
      $vop_healing_controller[$v] = $N_agent_healing[$v] * $bobot_controller[4];
      $vop_slow_controller[$v] = $N_agent_slow[$v] * $bobot_controller[5];
      $vop_enemydetect_controller[$v] = $N_agent_enemydetect[$v] * $bobot_controller[6];
      $vop_smoke_controller[$v] = $N_agent_smoke[$v] * $bobot_controller[7];
      $vop_teleport_controller[$v] = $N_agent_teleport[$v] * $bobot_controller[8];
      
    }

    for($v=1;$v<=$total;$v++)
    {        
      $vop_blind_initiator[$v] = $N_agent_blind[$v] * $bobot_initiator[0];
      $vop_self_healing_initiator[$v] = $N_agent_self_healing[$v] * $bobot_initiator[1];
      $vop_escape_initiator[$v] = $N_agent_escape[$v] * $bobot_initiator[2];
      $vop_aoe_initiator[$v] = $N_agent_aoe[$v] * $bobot_initiator[3];
      $vop_healing_initiator[$v] = $N_agent_healing[$v] * $bobot_initiator[4];
      $vop_slow_initiator[$v] = $N_agent_slow[$v] * $bobot_initiator[5];
      $vop_enemydetect_initiator[$v] = $N_agent_enemydetect[$v] * $bobot_initiator[6];
      $vop_smoke_initiator[$v] = $N_agent_smoke[$v] * $bobot_initiator[7];
      $vop_teleport_initiator[$v] = $N_agent_teleport[$v] * $bobot_initiator[8];
      
    }

    for($v=1;$v<=$total;$v++)
    {
        $total_vop_fragger[$v] = $vop_blind_fragger[$v] + $vop_self_healing_fragger[$v] + $vop_escape_fragger[$v] + $vop_aoe_fragger[$v] + $vop_healing_fragger[$v] + $vop_slow_fragger[$v] + $vop_enemydetect_fragger[$v] + $vop_smoke_fragger[$v] + $vop_teleport_fragger[$v];
        $total_vop_support[$v] = $vop_blind_support[$v] + $vop_self_healing_support[$v] + $vop_escape_support[$v] + $vop_aoe_support[$v] + $vop_healing_support[$v] + $vop_slow_support[$v] + $vop_enemydetect_support[$v] + $vop_smoke_support[$v] + $vop_teleport_support[$v];
        $total_vop_controller[$v] = $vop_blind_controller[$v] + $vop_self_healing_controller[$v] + $vop_escape_controller[$v] + $vop_aoe_controller[$v] + $vop_healing_controller[$v] + $vop_slow_controller[$v] + $vop_enemydetect_controller[$v] + $vop_smoke_controller[$v] + $vop_teleport_controller[$v];
        $total_vop_initiator[$v] = $vop_blind_initiator[$v] + $vop_self_healing_initiator[$v] + $vop_escape_initiator[$v] + $vop_aoe_initiator[$v] + $vop_healing_initiator[$v] + $vop_slow_initiator[$v] + $vop_enemydetect_initiator[$v] + $vop_smoke_initiator[$v] + $vop_teleport_initiator[$v];
    }

    $no_VOP         = array_keys($total_vop_support, max($total_vop_support));
    $max_VOP        = max($total_vop_support);

    $output = $no_VOP[0];
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
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <title>Paloran</title>
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

<div class="container-fluid bg-dark text-white">
<!--sidebar-->
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <br/>
    <br/>
    <br/>
    <a><b>Menu</b></a>
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
  </div>
  <span style="font-size:30px;cursor:pointer;position:fixed;" onclick="openNav()">&#9776; Menu</span>
  <!--End of sidebar-->
  <div class="container">

    <table class="table table-dark table-striped" width="90%" border="0" align="left" cellpadding="5" cellspacing="5" id="mytable">
                    <thead>
                      <tr>
                        <th width="10%" id="no"><div align="center">No</div></th>
                        <th width="10%" id="no"><div align="center"></div></th>
                        <th width="10%" id="age"><div align="center">Agent Name</div></th>
                        <th width="10%" id="age"><div align="center">Blind</div></th>
                        <th width="10%" id="age"><div align="center">Self Healing</div></th>
                        <th width="10%" id="age"><div align="center">Escape</div></th>
                        <th width="10%" id="age"><div align="center">AoE Damage</div></th>
                        <th width="10%" id="age"><div align="center">Heal Teammates</div></th>
                        <th width="10%" id="age"><div align="center">Slow Movement</div></th>
                        <th width="10%" id="age"><div align="center">Enemy Detection</div></th>
                        <th width="10%" id="age"><div align="center">Smoke/Map Separator</div></th>
                        <th width="10%" id="age"><div align="center">Teleportation</div></th>
                        <th width="10%" id="age"><div align="center">Overall Score (Support)</div></th>
                      </thead>
                    
                    <tbody>
                    <?php 
                    // looping per-baris
                    for($v=1;$v<=$total;$v++)
                    {
                    ?>
                      <tr>
                        <td><div align="center"><?php echo $v; ?></div></td>
                        <td><div align="center" style="margin-top: 5px">
                        <img class="card-img-top" src="<?php echo $agent_imagefoto[$v] ?>" alt="Card image cap">
                        </div></td>
                        <td><div align="center" style="margin-top: 5px">
                          <?php  echo $nama_agent[$v] ?>
                        </div></td>
                        <td><div align="center" style="margin-top: 5px">
                          <?php  echo $agent_blind[$v] ?>                   
                        </div></td>  
                        <td><div align="center" style="margin-top: 5px">
                          <?php  echo $agent_self_healing[$v] ?>
                        </div></td>
                        <td><div align="center" style="margin-top: 5px">
                          <?php  echo $agent_escape[$v] ?>
                        </div></td>                                                     
                        <td><div align="center" style="margin-top: 5px">
                          <?php  echo $agent_aoe[$v] ?>
                        </div></td>
                        <td><div align="center" style="margin-top: 5px">
                          <?php  echo $agent_healing[$v] ?>
                        </div></td>
                        <td><div align="center" style="margin-top: 5px">
                          <?php  echo $agent_slow[$v] ?>
                        </div></td>
                        <td><div align="center" style="margin-top: 5px">
                          <?php  echo $agent_enemydetect[$v] ?>
                        </div></td>
                        <td><div align="center" style="margin-top: 5px">
                          <?php  echo $agent_smoke[$v] ?>
                        </div></td>
                        <td><div align="center" style="margin-top: 5px">
                          <?php  echo $agent_teleport[$v] ?>
                        </div></td>
                        <td><div align="center" style="margin-top: 5px">
                          <?php  echo $total_vop_support[$v] ?>
                        </div></td>
                      </tr>
                    <?php
                    }
                    ?>                  
                    </tbody>
                  </table>

                  <?php echo "According to the calculations, the Agents that best to be a Support is: <b>", $nama_agent[$output], "</b>, with VOP score ", $max_VOP ?>. <a href="dssexplanation.php">How's this works?</a>

  </div>
  <footer class="container-fluid py-5" style="text-align:center;margin-top:3%;">
      &copy; Fata 2021
    </footer>
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