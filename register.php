<?php
$name = $_POST["userName"];
$email = $_POST["email1"];
$pass1 = $_POST["pass1"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Batch_103";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO user (name, email, pass)
VALUES ('$name', '$email', '$pass1')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  //$_SESSION["msg"]= "2 records updated or what ever your message is";
  header("Location: index.php");

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?>