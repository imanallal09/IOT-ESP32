<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
       .box-register
  {
    text-align:center;
    margin-bottom:0px;
  }
  .box-register a
  {
    text-decoration:none;
    font-size:15px;
    color:blue;
  }
  p.errorMessage {
    background-color: #e66262;
    border: #AA4502 1px solid;
    padding: 5px 10px;
    color: #FFFFFF;
    border-radius: 3px;
}
h1
{
    color: black;
    font-size: 40px;
    text-align:center;
}
.form-group input {
    font-size: 11px;
    background: #fff;
    border: 1px solid #ddd;
    margin-bottom: 23px;
    padding-left:9px;
    border-radius: 5px;
    width: 340px;
    height: 45PX;
  }
  .array_push{
    background-color: #e66262;
    border: #AA4502 1px solid;
    padding: 5px 10px;
    color: #FFFFFF;
    border-radius: 3px;
  }

      </style>
</head>
<body>
<header class="head-nav">
        <h2><a href="#"><i class="ion-plane"></i> NAVBAR</a></h2>
        <nav>
          <ul>
          <li>
                <a href="home.php" title="Hotels">HOME</a>
              </li>
            <li>
              <a href="login.php" title="Hotels">LOGIN</a>
            </li>
            <li>
              <a href="index.php" title="Flights">SERVER</a>
            </li>
            <li>
              <a href="mydatabase.php" title="Tours">SENSORDATA</a>
            </li>
          </ul>
        </nav>
    </header>
    <br> <br><br><br><br>
    <div class="container">
        <?php
        if (isset($_POST["submit"])) {
           $fullName = $_POST["fullname"];
           $email = $_POST["email"];
           $password = $_POST["password"];
           $passwordRepeat = $_POST["repeat_password"];
           
           $passwordHash = password_hash($password, PASSWORD_DEFAULT);

           $errors = array();
           
           if (empty($fullName) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
            array_push($errors,"All fields are required");
           }
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
           }
           if (strlen($password)<8) {
            array_push($errors,"Password must be at least 8 charactes long");
           }
           if ($password!==$passwordRepeat) {
            array_push($errors,"Password does not match");
           }
           require_once "database.php";
           $sql = "SELECT * FROM users WHERE email = '$email'";
           $result = mysqli_query($conn, $sql);
           
           if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
           }else{
            
            $sql = "INSERT INTO login (full_name, email, password) VALUES ( ?, ?, ? )";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"sss",$fullName, $email, $passwordHash);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>You are registered successfully.</div>";
            }else{
                die("Something went wrong");
            }
           }
          

        }
        ?>
        <form action="registration.php" method="post">
        <h1>REGISTER:</h1>
        
            <div class="form-group">
            <h5>Full Name:</h5>
                <input type="text" class="form-control" name="fullname" placeholder="Full Name:">
            </div>
            <div class="form-group">
            <h5>Email:</h5>
                <input type="emamil" class="form-control" name="email" placeholder="Email:">
            </div>
            <div class="form-group">
            <h5>Password:</h5>
                <input type="password" class="form-control" name="password" placeholder="Password:">
            </div>
            <div class="form-group">
            <h5>Repeat Password:</h5>
                <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password:">
            </div>
            <div class="form-btn">
                <input type="submit" href="esp32server.php" class="btn btn-primary" value="Register" name="submit">
            </div>
        </form>
        <div>
        <div><p class="box-register">Already Registered <a href="login.php">Login Here</a></p></div>
      </div>
    </div>
</body>
</html>