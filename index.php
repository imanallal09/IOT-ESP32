<?php
session_start();
if (!isset($_SESSION["login"])) {
   header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> Serveur ESP32</title>
 <style>
     @import url('https://fonts.googleapis.com/css?family=Lato:400,700');
     *, *:before, *:after {
  -webkit-box-sizing: inherit;
  -moz-box-sizing: inherit;
  box-sizing: inherit;
}
::-webkit-input-placeholder {
  color: #56585b;
}
::-moz-placeholder {
  color: #56585b;
}

:-moz-placeholder {
  color: #56585b;
}
html {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
body {
    background-image: linear-gradient(-225deg, #E3FDF5 0%, #64f6ca 100%);
background-image: linear-gradient(to top, #a8edea 0%, #37edf3 100%);
background-attachment: fixed;
  background-repeat: no-repeat;

    font-family: 'Vibur', cursive;
/*   the main font */
    font-family: 'Abel', sans-serif;
opacity: .95;
/* background-image: linear-gradient(to top, #d9afd9 0%, #97d9e1 100%); */
}
ul, nav{
  list-style: none;
  padding: 0;
}

a {
  color: #fff;
  text-decoration: none;
  cursor: pointer;
  opacity: 0.9;
}

a:hover {
  opacity: 1;
}

h1 {
  font-size: 3rem;
  font-weight: 700;
  color: #fff;
  margin: 0 0 1.5rem;
}

i {
  font-size: 1.3rem;
}

header {
  position: absolute;
  top: 0;
  left: 0;
  z-index: 10;
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  color: #fff;
  padding: 10px 100px 0;
}

header nav ul {
  display: flex;
}

header nav li{
  margin: 0 15px;
}

header nav li:first-child{
  margin-left: 0; 
}

header nav li:last-child{
  margin-right: 0;  
}

a.btn {
  color: #fff;
  padding: 10px;
  border: 1px solid rgba(255,255,255,0.5);
  -webkit-transition: all 0.2s;
  -moz-transition: all 0.2s;
  transition: all 0.2s;
}

a.btn:hover {
  background: #d73851;
  border: 1px solid #d73851;
  color: #fff;
}
form {
    width: 450px;
    min-height: 200px;
    height: auto;
    border-radius: 5px;
    margin: 2% auto;
    box-shadow: 0 9px 50px hsla(20, 67%, 75%, 0.31);
    padding: 3%;
    background-image: linear-gradient(-225deg, #E3FDF5 50%, #FFE6FA 50%);
}
form.formulair{
  width: 1570px;
    min-height: 10px;
    height: auto;
    border-radius: 5px;
    margin: 2% auto;
    box-shadow: 0 9px 50px hsla(20, 67%, 75%, 0.31);
    padding: 3%;
    background-image: linear-gradient(-225deg, #E3FDF5 50%, #FFE6FA 50%);
}
.containerers{
  position: absolute;
    top: 11%;
    left: 30%;
    transform: translate(-50%,50%);
    text-align: center;
}
form.monitoting{
  width: 450px;
    min-height: 300px;
    height: auto;
    border-radius: 5px;
    margin: 2% auto;
    box-shadow: 0 9px 50px hsla(20, 67%, 75%, 0.31);
    padding: 3%;
    background-image: linear-gradient(-225deg, #E3FDF5 50%, #FFE6FA 50%);
}

    
    h1
{
    color: black;
    font-size: 30px;
    text-align:center;
}
.container{
    position: absolute;
    top: 15%;
    left: 70%;
    transform: translate(-50%,50%);
    text-align: center;
}
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
form.contform{
  width: 1570px;
    min-height: 10px;
    height: auto;
    border-radius: 5px;
    margin: 2% auto;
    box-shadow: 0 9px 50px hsla(20, 67%, 75%, 0.31);
    padding: 3%;
    background-image: linear-gradient(-225deg, #E3FDF5 50%, #FFE6FA 50%);
}
.cont{
  position: absolute;
    top: 48%;
    left: 50%;
    transform: translate(-50%,50%);
    text-align: center;
}
input[type=text], input[type=number], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: rgb(251, 119, 141);
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
  background-color: rgb(251, 119, 141);
            cursor: pointer;
}
.contrfr{
    position: absolute;
    top: 62%;
    left: 50%;
    transform: translate(-50%,50%);
    text-align: center;
}


tr:hover {background-color: coral;}
th {
  width:40px;
  height:30px;
  background-color:white;
  color:orange;
}
table, th, td {
  border: 1px solid;
}
 
 </style>
</head>
<body>
<header>
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
    
     <?PHP
      require_once 'databasesensor.php';
      $sqldata = $pdo->query('SELECT * FROM esptest');
      //GET VALUES
      $esptest = $sqldata->fetchall(PDO::FETCH_ASSOC);
      //echo "<pre>";
     //print_r($esptest);
     echo "</pde>";
   ?>
      <br><br>
      <div>
      <form class="formulair">
      <h1>ESP32 web server</h1>
      </form>
      <div>
    <div class="container">
     <form>
     <h2>CONTROLLING</h2>
      <h3>Built-in LED-Board 1-GPIO 2</h3> 
     <label class="switch">
        <input type="checkbox">
        <span class="slider round"></span>
      </label>
      <h3>LED 2-Board 1-GPIO 33</h3>
      <label class="switch">
        <input type="checkbox">
        <span class="slider round"></span>
      </label>
    </form>
</div>
<div class="containerers">
     <form class="monitoting">
      
     <h2>MONITORING</h2>
     <table>
     <thead>
        <th scope="col">#</th>
        <th scope="col">temperature</th>
        <th scope="col">humidity</th>
        <th scope="col"> status_read_sensor_dht11</th>
     </thead>
     <tbody>
  <?php
  foreach($esptest as $esptest){ 
    ?>
     <tr>
    <td><?= $esptest['id'] ?></td>
    <td><?= $esptest['temperature'] ?></td>
    <td><?= $esptest['humidity'] ?></td>
    <td><?= $esptest['status_read_sensor_dht11'] ?></td>
</tr> 
<?php  
  }
?> 
</tbody>
</table>
    </form>
</div>     
<div class="contrfr">
<form class="contform">
  <p>LAST TIME RECEIVED DATA FROM ESP32[ <?php

$datetime = new DateTime( "now", new DateTimeZone( "Europe/Bucharest" ) );
echo 'DateTime:';
echo $datetime->format( ' Y-m-d | H:i:s' );?>]</p>
  <a href="mydatabase.php" class='btn btn-success link float-right' 
  style='color:white;background-color:black;'>Open Record Table</a>
  <a href="logout.php" class="btn btn-warning" style='color:white;background-color:orange;'>Logout</a>
</form>
</div>
</body>
</html>
