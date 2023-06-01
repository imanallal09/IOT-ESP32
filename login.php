<?php
session_start();
if (isset($_SESSION["login"])) {
   header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
       p.errorMessage {
    background-color: #e66262;
    border: #AA4502 1px solid;
    padding: 5px 10px;
    color: #FFFFFF;
    border-radius: 3px;
}
      h1{
  color:black;
  font-size: 40px;
    text-align:center;
}

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
  .form-group input {
    font-size: 14px;
    background: #fff;
    border: 1px solid #ddd;
    margin-bottom: 35px;
    padding-left:20px;
    border-radius: 5px;
    width: 347px;
    height: 50px;
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
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM login WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $login = mysqli_fetch_array($result,MYSQLI_ASSOC);
            if ($login) {
                if (password_verify($password, $login["password"])) {
                    session_start();
                    $_SESSION["login"] = "yes";
                    header("Location: index.php");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
        ?>
      <form action="login.php" method="post">
        <h1>LOGIN:</h1>
        
        <div class="form-group">
          <h5>Email:</h5>
            <input type="email" placeholder="Enter Email:" name="email" class="form-control">
        </div>
        <div class="form-group">
        <h5>Password:</h5>
            <input type="password" placeholder="Enter Password:" name="password" class="form-control">
        </div>
        <div class="form-btn">
        <input type="submit" value="Login" name="login" class="btn btn-primary">
        </div>
      </form>
      <div><p class="box-register">Not registered yet <a href="registration.php">Register Here</a></p></div>
    </div>
</body>
</html>