<?php
if (isset($_POST['Name']))
{
  $Name = $_POST['Name'];
  echo "<h3> hello $Name </h3>";
}

$Name = $_POST['name'];
$Wachtwoord = $_POST['ww'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tattoo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// $sql = "SELECT * from account where naam = $Name and Wachtwoord = $Wachtwoord";
$sql = "INSERT INTO account (naam, ww) VALUES ('$Name', '$Wachtwoord')"; 
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $Name["Name"]. " " . $Wachtwoord["password"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>