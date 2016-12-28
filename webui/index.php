<!DOCTYPE html>

<?php
$servername = "YOUR_HOST";
$username = "USERNAME";
$password = "PASSWORD";
$dbname = "DB_NAME";
?>

<html lang="it-IT">
 <head>
 <meta charset = "UTF-8">
 <title>Fail2ban list</title>
 <link rel = "stylesheet"
   type = "text/css"
   href = "index.css" />
 </head>
 <body>

<div class="wrapper">

<h1 id="table_title">fail2ban list</h1>
  
  <div class="table">
    
    <div class="row header">
      <div class="cell">
        ID
      </div>
      <div class="cell">
        Service
      </div>
      <div class="cell">
        Protocol
      </div>
      <div class="cell">
        Port
      </div>
      <div class="cell">
        IP
      </div>
      <div class="cell">
        Ban count
      </div>
      <div class="cell">
        Longitude
      </div>
      <div class="cell">
        Latitude
      </div>
      <div class="cell">
        Country
      </div>
      <div class="cell">
        Geo data
      </div>
      <div class="cell">
        Date/Time
      </div>
    </div>

<?php
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM fail2ban";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
	echo "<div class='row'>";
	echo "<div class='cell'>";
	echo $row["id"];
	echo "</div>";
        echo "<div class='cell'>";
        echo $row["name"];
        echo "</div>";
        echo "<div class='cell'>";
        echo $row["protocol"];
        echo "</div>";
        echo "<div class='cell'>";
        echo $row["port"];
        echo "</div>";
        echo "<div class='cell'>";
        echo $row["ip"];
        echo "</div>";
        echo "<div class='cell'>";
        echo $row["count"];
        echo "</div>";
        echo "<div class='cell'>";
        echo $row["longitude"];
        echo "</div>";
        echo "<div class='cell'>";
        echo $row["latitude"];
        echo "</div>";
        echo "<div class='cell'>";
        echo $row["country"];
        echo "</div>";
        echo "<div class='cell'>";
        echo $row["geo"];
        echo "</div>";
        echo "<div class='cell'>";
        echo $row["timestamp"];
        echo "</div>";
	echo "</div>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>

  </div>

<h5 id="table_footer">By Amedeo Baragiola <ingamedeo[at]gmail[dot]com</h6>

</div>

</body>
</html>
