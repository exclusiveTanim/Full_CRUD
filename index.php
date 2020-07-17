<?php
include "database.php";
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $myusername = mysqli_real_escape_string($conn,$_POST['exampleInputEmail1']);
  $mypassword = mysqli_real_escape_string($conn,$_POST['exampleInputPassword1']);

  $sql = "SELECT id FROM user WHERE email = '$myusername' and pass = '$mypassword'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  //$active = $row['name'];
      
  $count = mysqli_num_rows($result);

  if($count == 1) {
      //session_register("$myusername");
      $_SESSION["login_user"] = $myusername;
      //echo "Session variables are set. and name is:". $_SESSION["login_user"];
      header("location: home.php");
    }else {
      echo "Your Login Name or Password is invalid";
      $error = "Your Login Name or Password is invalid";
    }     
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>New Site</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1 style="text-align: center;">Login here</h1>	
<div class="first_div">	
<form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="exampleInputEmail1"
    id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="exampleInputPassword1" id="exampleInputPassword1">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<div class="second_div">
	<span class="d-flex justify-content-center pt-1"><label><b>Don't have a account?</b></label>
	<a href="register.html"><button type="button" class="btn btn-info">Register Here</button></a></span>
</div>
</body>
</html>