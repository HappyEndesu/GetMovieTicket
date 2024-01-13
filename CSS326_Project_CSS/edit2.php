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
				<section class="screenings">
                    <h2>Edit/Delete Screenings</h2>
                    <form action="redirect.php" method="post">
                    <?php
                        $ShowID = $_GET['ShowID'];
                        $q="SELECT * FROM SCREENING 
                        INNER JOIN cinema_hall ON cinema_hall.CinemaHallID = screening.CinemaHallID
                        INNER JOIN movie ON movie.MovieID = screening.MovieID
                        WHERE ShowID = '$ShowID'";
                        $result=$mysqli->query($q);

                        while ($row = $result->fetch_array()) {

                            $screeningShowID=$row['ShowID'];
                            $cinemaName=$row['Name'];
                            $cinemaID=$row['CinemaHallID'];
                            $movieName=$row['Title'];
                            $movieID=$row['MovieID'];
                            $screeeningStart=$row['Date'].'T'.$row['StartTime'];

                            echo "<label for='cinemaHall'>Cinema Hall:</label>";
						    echo "<select id='cinemaHall' name='cinemaHall'>";
							echo "<option value=" .'"'. $cinemaID .'"'. " selected hidden>" . $cinemaName . "</option>";
                            
                            $q='select CinemaHallID, Name from cinema_hall;';
                            if($result=$mysqli->query($q)){
                                while($row=$result->fetch_array()){
                                    echo '<option value="'.$row[0].'">'.$row[1].'</option>';
                                }
                            } else {
                                echo 'Query error: '.$mysqli->error;
                            }

						    echo "</select>";

						    echo "<label for='movie'>Movie:</label>";
                            echo "<select id='movie' name='movie'>";
							echo "<option value=".'"'. $movieID .'"'." selected hidden>" . $movieName . "</option>";

                            $q='select MovieID , Title from movie;';
                            if($result=$mysqli->query($q)){
                                while($row=$result->fetch_array()){
                                    echo '<option value="'.$row[0].'">'.$row[1].'</option>';
                                }
                            } else {
                                echo 'Query error: '.$mysqli->error;
                            }

						    echo "</select>";

						    echo "<label for='screeningTime'>Start at:</label>";
						    echo "<input type='datetime-local' id='screeningTime' name='screeningTime' value=" . $screeeningStart . " required>";

                            echo "<button type='submit' name='screening-edit-sub' value='Submit'>Update</button>";
                            echo "<button><a href='admin.php'>Cancel</a></button>";

                            echo "<input type='hidden' name='ShowID' value=" . $screeningShowID . " >";
                        }
                    ?>
					</form>
				</section>
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