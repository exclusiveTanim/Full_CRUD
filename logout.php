<?php
   session_start();
   
   if(session_destroy()) {
   	header("Location: index.php");
   	session_unset(["$login_session"]);
   }

?>