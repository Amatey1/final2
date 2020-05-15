<?php
$server_name="localhost";
$user_name="root";
$password="";
$db_name="projectfinal";
   $db_conn = mysqli_connect($server_name,$user_name,$password,$db_name);

   if(!$db_conn)
   {
       die('Your connection is off'.mysqli_error($db_conn ));
   }
  
?>