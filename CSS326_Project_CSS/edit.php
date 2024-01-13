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
				<section class="movies">
                    <h2>Edit/Delete Movies</h2>
                    <form action="redirect.php" method="post">
                    <?php
                        $MovieID = $_GET['MovieID'];
                        $q="SELECT * FROM MOVIE WHERE MovieID = '$MovieID'";
                        $result=$mysqli->query($q);

                        while ($row = $result->fetch_array()) {

                            echo "<label>Movie Title:</label>";
                            echo "<input type='text' name='Title' value=" .'"'. $row['Title'] .'"'. " required>";

                            echo "<label>Description:</label>";
						    echo "<textarea placeholder='Description' name='Desc' rows='5' cols='70' required>" . $row['Description'] . "</textarea>";

						    echo "<label>Language:</label>";
						    echo "<input type='text' name='Lang' value=" .'"'. $row['Language'] .'"'. " required>";

						    echo "<label>Release Date:</label>";
						    echo "<input type='date' name='RelDate' value=" .'"'. $row['ReleaseDate'] .'"'. " required>";

						    echo "<label>Country:</label>";
						    echo "<input type='text' name='Country' value=" .'"'. $row['Country'] .'"'. " required>";

						    echo "<label>Genre:</label>";
						    echo "<input type='text' name='Genre' value=" .'"'. $row['Genre'] .'"'. " required>";

						    echo "<label>Duration (minutes):</label>";
						    echo "<input type='number' name='Duration' value=" .'"'. $row['Duration'] .'"'. " required>";

                            echo "<button type='submit' name='movie-edit-sub' value='Submit'>Update</button>";
                            echo "<button><a href='admin.php'>Cancel</a></button>";

                            echo "<input type='hidden' name='MovieID' value=" . $row['MovieID'] . " >";
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