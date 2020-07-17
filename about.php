<?php
   include('session.php');
?>
<html">
   
   <head>
      <title>Welcome</title>
   </head>
   
   <body style="background-color: yellow;">
      <h1>Welcome <?php echo $login_session; ?></h1> 
      <h2>About Page</h2>
      <a href="home.php">Back Home Page</a>
   </body>
   
</html>