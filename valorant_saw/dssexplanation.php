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
        <a class="nav-link button--border-cover" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link button--border-cover" href="agent.php">Agents</a>
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

    <div class="container">

      <div class="section1">
        <div class="col-md">
          <h4 class="featurette-heading"><img src="img/valorant_icon.jpg" width="30" height="30" alt=""> How the Calculation Works</h4>
        </div>

        <hr class="featurette-divider">

        <p>First of all, we use the Simple Additive Weighting Method for the calculation on this website. Simple Additive Weighting itself is a Decision Support that often 
            also known as the weighted summing method. The basic concept of the SAW method is to find the weighted sum of performance ratings on each alternative on all attributes. 
            The SAW method requires the process of normalizing the decision matrix (X) to a scale comparable to all existing alternative ratings. </p>
        
        <p>We Determine some criteria by doing an interview with a pro player, and we gives a value to that criteria to calculate the overall score (VOP) to the agents of selected role.</p>
        <p>For example, we want to do a calculation to determine which agent is the most suited to play <b>Fragger</b> role, we choose the criteria that is most important for the Fragger role.</p>

        <table class="table text-white" style="width:30%;">
            <thead>
                <tr>
                <th scope="col">No.</th>
                <th scope="col">Criteria Name</th>
                <th scope="col">Value Points</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">1</th>
                <td>Blind Ability</td>
                <td>0.50</td>
                </tr>
                <tr>
                <th scope="row">2</th>
                <td>Self-Healing Ability</td>
                <td>0.25</td>
                </tr>
                <tr>
                <th scope="row">3</th>
                <td>Escape Ability</td>
                <td>1.00</td>
                </tr>
                <tr>
                <th scope="row">4</th>
                <td>AoE Damage</td>
                <td>0.75</td>
                </tr>
            </tbody>
        </table>

        <p> The more high the <b>value point</b> is, the more important that ability or criteria for a certain role.<br/>Now say we have 3 candidates, let's take Jett, Omen, 
        and Cypher for our example.</p>

        <table class="table text-white" style="width:40%;">
            <thead>
                <tr>
                <th scope="col">No.</th>
                <th scope="col">Agent Name</th>
                <th scope="col">Blind Ability</th>
                <th scope="col">Self-Healing Ability</th>
                <th scope="col">Escape Ability</th>
                <th scope="col">AoE Damage</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">1</th>
                <td>Jett</td>
                <td>0</td>
                <td>0</td>
                <td>4</td>
                <td>0</td>
                </tr>
                <tr>
                <th scope="row">2</th>
                <td>Omen</td>
                <td>1</td>
                <td>0</td>
                <td>2</td>
                <td>0</td>
                </tr>
                <tr>
                <th scope="row">3</th>
                <td>Cypher</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                </tr>
            </tbody>
        </table>
        <p>As shown in the table above, are the agents with their ability counts that match the four criteria we need for the <b>Fragger</b> Role.
      
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