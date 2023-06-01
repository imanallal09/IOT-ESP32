<?php
session_start();
if (!isset($_SESSION["login"])) {
   header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
.styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
.styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
}
.styled-table th,
.styled-table td {
    padding: 12px 15px;
}
.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}
.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}
        
        th, td {
  border-bottom: 1px solid #ddd;
  width: 150px;
}
.btn-primary {
  color: white;
  background-color: green;

}
.btn-danger{
  color:white;
  background-color: red;
}
h2{
    color: white;
    font-size: 26px;
    text-align:center;

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
<br><br><br><br><br>
     <?PHP
       require_once 'databasesensor.php';
       //REQUET
      $sqldata = $pdo->query('SELECT * FROM sensordata');
      //GET VALUES
      $sensordatas = $sqldata->fetchall(PDO::FETCH_ASSOC);
      //echo "<pre>";
     //print_r($sensordatas);
     echo "</pde>";
   ?>
   <div class="container">
   <table class="styled-table">
   <h2>ESP32_01 RECORD DATA TABLE:</h2>
    <thead>
        <th scope="col">#</h>
        <th scope="col">sensor</th>
        <th scope="col">location</th>
        <th scope="col">value1</th>
        <th scope="col">value2</th>
        <th scope="col">value3</th>
        <th scope="col">reading_time</th>
         
</thead>
<tbody>
  <?php
  foreach($sensordatas as $sensordata){
    ?>
    <tr>
    <td><?= $sensordata['id'] ?></td>
    <td><?= $sensordata['sensor'] ?></td>
    <td><?= $sensordata['location'] ?></td>
    <td><?= $sensordata['value1'] ?></td>
    <td><?= $sensordata['value2'] ?></td>
    <td><?= $sensordata['value3'] ?></td>
    <td><?php

$datetime = new DateTime( "now", new DateTimeZone( "Europe/Bucharest" ) );

echo $datetime->format( 'Y-m-d H:i:s' );?></td>
    </tr>
    <?php  
  }
?> 
</tbody>
</table>
</div>
<div class="container">
        <a href="index.php" class="btn btn-warning" style='color:white;background-color:black;'>Back</a>
        <a href="logout.php" class="btn btn-warning" style='color:white;background-color:orange;'>Logout</a>
    </div>
</body>
</html>