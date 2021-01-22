 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webProj";


$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = " SELECT * FROM `exercises` where name = 'likith' ";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);

$conn->close();
?> 

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'
    integrity='sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1' crossorigin='anonymous'>
  <link rel='stylesheet' href='../style.css'>
</head>
<body>
    
  <nav class="navbar navbar-expand-lg navbar-light bg-light navbarMain">
    <div class="container-fluid" style="height: 70px; margin-bottom: 10px; ">
      <a class="navbar-brand" href="../index.html"
        style="font-weight:normal; font-size:40px; margin-left: 20px;"> FitLife</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-bottom: 0px; font-size: large; ">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Calculations
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="../Calculators/BodyFatCalculator.html">BodyFat Percentage</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="../Calculators/CalorieCalculator.html">Calories Calculator</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="../Calculators/IdealWeightCalculator.html">Ideal weight Calculator</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Workout
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="../WorkoutRoutines/Male.html">Male</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="../WorkoutRoutines/Female.html">Female</a></li>

            </ul>
          </li>
        </ul>
        <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle themeChangeDropdown" href="#" id="navbarDropdown" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            <span id="themeDropDown">Change Theme</span>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item lightMode" href="#" onclick="lightMode()">Light Mode</a></li>
            <li><a class="dropdown-item darkMode" href="#" onclick="darkMode()">Dark Mode</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav><br />

     <?php
    while($row = mysqli_fetch_array($result))
    {
    echo "
    <div class='container'>
    <div class='card' style='width: 18rem;'>
        <div class='card-body'>
          <h5 class='card-title'>".$row["name"]."</h5>
          <h6 class='card-subtitle mb-2 text-muted'>".$row["workout"]."</h6>
          <p class='card-text'>".$row["date"]."</p>
          <p class='card-text'>".$row["time"]."</a>
          <p class='card-text'>".$row["duration"]."</a>
        </div>
      </div>
    </div>
    ";
    }
    ?> 
    <hr>
    
    <footer style="height: 30vh; background-color: #f8f9fa; padding: 20px;">
      <div style="display: flex;"><h6 style="margin: auto;" class="logo">Check out our other links here!</h6></div><br><br>
      <div class="container" style="display: grid; grid-template-columns: 1fr 1fr 1fr; width: 50%;">
        <div style="margin: auto;" class="logo">
          <i class="fab fa-2x fa-bootstrap"></i>
        </div>
        <div style="margin: auto;">
          <i class="fab fa-2x fa-github" class="logo"></i>
        </div>
        <div style="margin: auto; ">
          <i class="fab fa-2x fa-twitter" class="logo"></i>
        </div>
        <div style="height: 6vh;"></div>
        <div style="height: 6vh;"></div>
        <div style="height: 6vh;"></div>
        <span style="margin: auto; grid-column: 2/3;"><a href="../index.html"
          style="color: black; text-decoration: none;" class="logo">&copy; FitLife</a></span> 
      </div>
  </footer>

    <script src="https://kit.fontawesome.com/6713bd8137.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
    crossorigin="anonymous"></script>
  <script src="TcGe.js"></script>
</body>
</html>