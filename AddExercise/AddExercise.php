<?php

$insert = false;
if(isset($_POST['name'])){
    
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbName = "webProj";
    
    $con = mysqli_connect($server, $username, $password, $dbName);
    
    
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
     
    $name = $_POST['name'];
    $workout = $_POST['Workout'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $duration = $_POST['duration'];
    $calories = $_POST['calories'];

    $sql = "INSERT INTO `webProj`.`newExercises` (`name`, `workout`, `date`, `time`, `duration`, `calories`) 
    VALUES ('$name', '$workout', '$date', '$time', '$duration', '$calories');";

    if($con->query($sql) == true){
      $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbarMain">
        <div class="container-fluid" style="height: 70px; margin-bottom: 10px; ">
          <a class="navbar-brand" href="../dashboard.php" style="font-weight:normal; font-size:40px; margin-left: 20px;"> FitLife</a>
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

              <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Members Data
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li>
                <a class="dropdown-item" href="AddExercise.php">Add Exercise</a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li>
                <a class="dropdown-item" href="GetExercise.php">Get Exercise List</a>
              </li>
            </ul>
            </li>

            </ul>
            <div class="nav-item dropdown">
              <a class="nav-link dropdown-toggle themeChangeDropdown" href="#" id="navbarDropdown" 
              role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span id="themeDropDown">Change Theme</span>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item lightMode" href="#" onclick="lightMode()">Light Mode</a></li>
                <li><a class="dropdown-item darkMode" href="#" onclick="darkMode()">Dark Mode</a></li>
              </ul>
            </div>
            <div>
          <a href="../logout.php"><button class="btn btn-danger" 
          onclick="alert('You will be returned to the Landing Page')">Log Out</button></a>
        </div>
          </div>
        </div>
      </nav> <br/>
    <div class="container">
        <h3 class="logo">Enter your Workout Details</h3>
        <br/>

        <?php
        if($insert == true){
        echo "<span style = 'display: flex;'><h6 style='margin: auto; color: green;'>
        Your response has been submitted successfully!</h6></span>";
        }
    ?>

        <form action="AddExercise.php" method="post" style="margin: auto; width: 50%;">
            <div class="form-group">
                <label>Name: </label>
                  <input type='text' class='form-control' id='name' name='name'/>
            </div><br>
            <div class="form-group">
                <label>Workout: </label>
                <select class="form-control" id="Workout" name="Workout">
                    <option value="">---Select A Workout---</option>
                    <option value="Workout 1">Workout 1</option>
                    <option value="Workout 2">Workout 2</option>
                    <option value="Workout 3">Workout 3</option>
                    <option value="Workout 4">Workout 4</option>
                    <option value="Workout 5">Workout 5</option>
                </select>
            </div><br>
            <div class="form-group">
                <label>Date: </label>
                <input type="date" class="form-control" id="date" name="date">
            </div><br>
            <div class="form-group">
                <label>Time: </label>
                <input type="time" class="form-control" id="time" name="time">
            </div><br>
            <div class="form-group">
                <label>Duration (min): </label>
                <input type="number" class="form-control" id="duration" name="duration">
            </div><br>
            <div class="form-group">
                <label>Calories Burnt: </label>
                <input type="number" class="form-control" id="calories" name="calories">
            </div><br>
            <div class="form-group" style="display: flex;">
                <button class="btn btn-success" style="margin: auto;">Submit</button>
            </div>
        </form> <br>
        <!-- <button class="btn btn-primary" style="margin: auto;"><a href="./GetExercise.php" style="color: white; text-decoration: none;">
        See Your Exercises</a> </button>  -->
        

    </div><hr/>

    <footer style="height: 30vh; background-color: #f8f9fa; padding: 20px;">
    <div style="display: flex;" class="logo"><h6 style="margin: auto;">Check out our other links here!</h6></div><br><br>
    <div class="container" style="display: grid; grid-template-columns: 1fr 1fr 1fr; width: 50%;">
    <div style="margin: auto;" class="logo">
        <i class="fab fa-2x fa-instagram" ></i>
      </div>
      <div style="margin: auto;" class="logo">
        <i class="fab fa-2x fa-facebook"></i>
      </div>
      <div style="margin: auto; " class="logo">
        <i class="fab fa-2x fa-twitter"></i>
      </div>
      <div style="height: 6vh;"></div>
      <div style="height: 6vh;"></div>
      <div style="height: 6vh;"></div>
      <span style="margin: auto; grid-column: 2/3;"><a href="../dashboard.php"
        style="color: black; text-decoration: none;" class="logo">&copy; FitLife</a></span> 
    </div>
</footer>
<script src="https://kit.fontawesome.com/6713bd8137.js" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
    crossorigin="anonymous"></script>
    <script src="TcAe.js"></script>
</body>
</html>