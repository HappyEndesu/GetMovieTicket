<?php require_once('connect.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Panel</title>
    <link rel='stylesheet' href='style.css'>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');
        @media screen and (max-width: 900px) {
            .top-nav img,
            .top-nav-right { 
                display: none;
            }

            .top-nav {
                height: 37px;
            }

            .bot-nav-item {
                min-width: 380px;
            }
        }
    </style>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class='main-content'>
        <div class='main-content-center'>
            <div class='box'>
                <div class='echo'>
                    <?php

                        if(isset($_POST['movie-sub'])) {
                            // insert data to movie
                            $Title = $mysqli->real_escape_string($_POST['Title']);
                            $Desc = $mysqli->real_escape_string($_POST['Desc']);
                            $Lang = $mysqli->real_escape_string($_POST['Lang']);
                            $RelDate = $mysqli->real_escape_string($_POST['RelDate']);
                            $Country = $mysqli->real_escape_string($_POST['Country']);
                            $Genre = $mysqli->real_escape_string($_POST['Genre']);
                            $Duration = isset($_POST['Duration']) ? intval($_POST['Duration']) : 0;
                            $mysqlRelDate = date('Y-m-d', strtotime($RelDate));

                            $q="INSERT INTO MOVIE (TITLE, DESCRIPTION, LANGUAGE, RELEASEDATE, COUNTRY, GENRE, DURATION) 
                            VALUES ('$Title','$Desc','$Lang','$mysqlRelDate','$Country','$Genre','$Duration')";
                            $result=$mysqli->query($q);

                            if(!$result){
                                echo "INSERT failed. Error: ".$mysqli->error ;
                            } else {
                                echo "The movie has been successfully added!" ;
                            }
                        }

                        if(isset($_POST['movie-edit-sub'])) {
                            // update data in movie
                            $MovieID = $mysqli->real_escape_string($_POST['MovieID']);
                            $Title = $mysqli->real_escape_string($_POST['Title']);
                            $Desc = $mysqli->real_escape_string($_POST['Desc']);
                            $Lang = $mysqli->real_escape_string($_POST['Lang']);
                            $RelDate = $mysqli->real_escape_string($_POST['RelDate']);
                            $Country = $mysqli->real_escape_string($_POST['Country']);
                            $Genre = $mysqli->real_escape_string($_POST['Genre']);
                            $Duration = intval($_POST['Duration']);
                            
                            $mysqlRelDate = date('Y-m-d', strtotime($RelDate));

                            $q="UPDATE MOVIE SET `TITLE`='$Title', `DESCRIPTION`='$Desc', `LANGUAGE`='$Lang', `RELEASEDATE`='$mysqlRelDate', `COUNTRY`='$Country', `GENRE`='$Genre', `DURATION`='$Duration' WHERE `MOVIEID`='$MovieID'";
                            $result=$mysqli->query($q);

                            if(!$result){
                                echo "Update failed. Error: ".$mysqli->error;
                            } else {
                                echo "The data has been successfully updated!" ;
                            }
                        }

                        if(isset($_POST['screening-sub'])) {
                            // insert data to screening
                            $cinemaHall = $mysqli->real_escape_string($_POST['cinemaHall']);
                            $movie = $mysqli->real_escape_string($_POST['movie']);
                            $screeningTime= $mysqli->real_escape_string($_POST['screeningTime']);
                        
                            $mysqlStartAt = date('H:i:s', strtotime($screeningTime));
                            $mysqlStartDate = date('Y-m-d', strtotime($screeningTime));

                            $q="SELECT DURATION FROM MOVIE WHERE MOVIEID = '$movie'";
                            $result=$mysqli->query($q);
                            $Duration=$result->fetch_array();

                            $mysqlDuration = date('H:i:00', mktime(0, $Duration[0]));

                            $q="INSERT INTO SCREENING (DATE, STARTTIME, ENDTIME, CINEMAHALLID, MOVIEID) 
                            VALUES ('$mysqlStartDate','$mysqlStartAt',ADDTIME('$mysqlStartAt','$mysqlDuration'),'$cinemaHall','$movie')";
                            $result=$mysqli->query($q);

                            if(!$result){
                                echo "INSERT failed. Error: ".$mysqli->error ;
                            } else {
                                echo "The screening has been successfully added!" ;
                            }
                        }

                        if(isset($_POST['screening-edit-sub'])) {
                            // update data in movie
                            $ShowID = $mysqli->real_escape_string($_POST['ShowID']);
                            $Date = $mysqli->real_escape_string($_POST['screeningTime']);
                            $CinemaHallID = $mysqli->real_escape_string($_POST['cinemaHall']);
                            $MovieID = $mysqli->real_escape_string($_POST['movie']);

                            $mysqlStartAt = date('H:i:s', strtotime($Date));

                            $q="SELECT DURATION FROM MOVIE WHERE MOVIEID = '$MovieID'";
                            $result=$mysqli->query($q);
                            $Duration=$result->fetch_array();

                            $mysqlDuration = date('H:i:00', mktime(0, $Duration[0]));

                            $q="UPDATE SCREENING SET `DATE`='$Date', `STARTTIME`='$mysqlStartAt', `ENDTIME`=ADDTIME('$mysqlStartAt','$mysqlDuration'), `CINEMAHALLID`='$CinemaHallID', `MOVIEID`='$MovieID' WHERE `SHOWID`='$ShowID'";
                            $result=$mysqli->query($q);

                            if(!$result){
                                echo "Update failed. Error: ".$mysqli->error;
                            } else {
                                echo "The data has been successfully updated!" ;
                            }
                        }

                    ?>
                </div>
                <button><a href='admin.php'>Back<a></button>
            </div>
        </div>
    </div>
    <footer>
        <div class=''>
            <a class='foot-text' href='about.html'>about us</a>
            <a class='foot-text' href='contact.html'>contact us</a>
        </div>
    </footer>
</body>
</html>