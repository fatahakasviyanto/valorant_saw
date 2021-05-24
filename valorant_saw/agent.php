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

$sql = "SELECT * FROM agents ORDER BY nama_agent";

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
    <link href="https://fonts.googleapis.com/css2?family=Play&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

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

        <div class="section1">

            <h4 class="featurette-heading"><img src="img/valorant_icon.jpg" width="30" height="30" alt=""> Agents</h4>

        </div>

        <hr class="featurette-divider"/>

        <div id="grid-container">
            <?php while($data = $hasil->fetch()): ?>
            <div id="grid-item">
                <div class="card bg-secondary text-light" style="width: 19rem;">
                <img class="card-img-top" src="<?php echo $data['imagefoto']; ?>" alt="Card image cap" style="width:auto;height:300px;object-fit: cover;"></a>
                <div class="card-body">
                    <h4 class="card-title"><?= $data["nama_agent"]; ?></h4>
                    <p class="card-text"><?= $data["description_agent"]; ?></p>
                </div>
                </div>
            </div>
            <?php endwhile; ?>
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