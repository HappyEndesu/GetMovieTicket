<?php
    require_once('connect.php');
	$MovieID = $_GET['MovieID'];
	$ShowID = $_GET['ShowID'];
	if (isset($MovieID)) {
		$q="DELETE FROM MOVIE WHERE MOVIEID=$MovieID";
	        if(!$mysqli->query($q)){
		    	echo "DELETE failed. Error: ".$mysqli->error ;
		    }
            $mysqli->close();
           
		    header("Location: admin.php");
	}
	
	elseif (isset($ShowID)) {
		$q="DELETE FROM SCREENING WHERE SHOWID=$ShowID";
	        if(!$mysqli->query($q)){
		    	echo "DELETE failed. Error: ".$mysqli->error ;
		    }
            $mysqli->close();
           
		    header("Location: admin.php");
    }
?>