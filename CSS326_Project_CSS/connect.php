<?php
$mysqli = new mysqli('localhost','root','root','movie_booking');
   if($mysqli->connect_errno){
      echo $mysqli->connect_errno.": ".$mysqli->connect_error;
   }
?>