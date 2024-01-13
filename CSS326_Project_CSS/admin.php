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
				<h2>Movies Table</h2>
				<div class='table-show'>
					<table>
						<col width="3%">
						<col width="20%">
						<col width="20%">
						<col width="5%">
						<col width="12%">
						<col width="15%">
						<col width="10%">
						<col width="5%">

						<tr>
							<th>ID</th>
							<th>Title</th>
							<th>Description</th>
							<th>Language</th>
							<th>Release Date</th>
							<th>Country</th>
							<th>Genre</th>
							<th>Duration</th>
						</tr>

						<?php 
                        $q="SELECT * FROM MOVIE";
                        $result=$mysqli->query($q);
                        if(!$result){
                            echo "Select failed. Error: ".$mysqli->error ;
                            return false;
                        }
                    while($row=$result->fetch_array()){ ?>
						<tr>
							<td>
								<?echo$row['MovieID']?>
							</td>
							<td>
								<?echo$row['Title']?>
							</td>
							<td>
								<?echo$row['Description']?>
							</td>
							<td>
								<?echo$row['Language']?>
							</td>
							<td>
								<?echo$row['ReleaseDate']?>
							</td>
							<td>
								<?echo$row['Country']?>
							</td>
							<td>
								<?echo$row['Genre']?>
							</td>
							<td>
								<?echo$row['Duration']?>
							</td>
							<td>
								<a href='edit.php?MovieID=<?=$row['MovieID']?>'>
									<img class="icon" src="images/Modify.png">
							</td>
							<td>
								<a href='delete.php?MovieID=<?=$row['MovieID']?>'>
									<img class="icon" src="images/Delete.png">
								</a>
							</td>
						</tr>
						<?php } ?>

						<?php 
                // count the no. of entries
                $count=$result->num_rows;
                echo "<tr><td colspan='8' style='text-align: right;'>Total $count records(s)</td></tr>";
                ?>
					</table>
				</div>
			</div>
			<div class='box'>
				<h2>Screenings Table</h2>
				<div class='table-show'>
					<table>
						<col width="3%">
						<col width="17%">
						<col width="20%">
						<col width="20%">
						<col width="15%">
						<col width="15%">

						<tr>
							<th>ID</th>
							<th>Date</th>
							<th>Start At</th>
							<th>End At</th>
							<th>Cinema Hall ID</th>
							<th>Movie ID</th>
						</tr>

						<?php 
                        $q="SELECT * FROM SCREENING";
                        $result=$mysqli->query($q);
                        if(!$result){
                            echo "Select failed. Error: ".$mysqli->error ;
                            return false;
                        }
                    while($row=$result->fetch_array()){ ?>
						<tr>
							<td>
								<?echo$row['ShowID']?>
							</td>
							<td>
								<?echo$row['Date']?>
							</td>
							<td>
								<?echo$row['StartTime']?>
							</td>
							<td>
								<?echo$row['EndTime']?>
							</td>
							<td>
								<?echo$row['CinemaHallID']?>
							</td>
							<td>
								<?echo$row['MovieID']?>
							</td>
							<td>
								<a href='edit2.php?ShowID=<?=$row['ShowID']?>'>
									<img class="icon" src="images/Modify.png">
							</td>
							<td>
								<a href='delete.php?ShowID=<?=$row['ShowID']?>' onclick=\"return confirm('Confirm delete data ?')\">
									<img class="icon" src="images/Delete.png">
								</a>
							</td>
						</tr>
						<?php } ?>

						<?php 
                // count the no. of entries
                $count=$result->num_rows;
                echo "<tr><td colspan='6' style='text-align: right;'>Total $count records(s)</td></tr>";
                ?>
					</table>
				</div>
			</div>
			<div class='box'>
				<section class="movies">
					<h2>Add Movies</h2>
					<form action="redirect.php" method="post">
						<!-- Your form fields for adding movies and screening -->
						<label for="Title">Movie Title:</label>
						<input type="text" id="Title" name="Title" required>

						<label for="Desc">Description:</label>
						<textarea id='Desc' name="Desc" placeholder="Description" rows="5" cols="70"></textarea>

						<label for="Lang">Language:</label>
						<input type="text" id="Lang" name="Lang" required>

						<label for="RelDate">Release Date:</label>
						<input type="date" id="RelDate" name="RelDate" required>

						<label for="Country">Country:</label>
						<input type="text" id="Country" name="Country" required>

						<label for="Genre">Genre:</label>
						<input type="text" id="Genre" name="Genre" required>

						<label for="Duration">Duration (minutes):</label>
						<input type="number" id="Duration" name="screeningTimeEnd" required>

						<button type="submit" name='movie-sub' value="Submit">Add</button>
					</form>
				</section>
			</div>
			<div class='box'>
				<section class="screenings">
					<h2>Add Screenings</h2>
					<form action="redirect.php" method="post">
						<!--<label for="cinema">Cinema:</label>-->

						<label for="cinemaHall">Cinema Hall:</label>
						<select id="cinemaHall" name="cinemaHall">
							<option value="" selected disabled hidden>Choose Cinema Hall</option>
							<?php
                                $q='select CinemaHallID, Name from cinema_hall;';
                                if($result=$mysqli->query($q)){
                                    while($row=$result->fetch_array()){
                                        echo '<option value="'.$row[0].'">'.$row[1].'</option>';
                                    }
                                }else{
                                    echo 'Query error: '.$mysqli->error;
                                }
                            ?>
						</select>

						<label for="movie">Movie:</label>
						<select id="movie" name="movie">
							<option value="" selected disabled hidden>Choose Movie</option>
							<?php
                                $q='select MovieID , Title from movie;';
                                if($result=$mysqli->query($q)){
                                    while($row=$result->fetch_array()){
                                        echo '<option value="'.$row[0].'">'.$row[1].'</option>';
                                    }
                                }else{
                                    echo 'Query error: '.$mysqli->error;
                                }
                            ?>
						</select>

						<label for="screeningTime">Start at:</label>
						<input type="datetime-local" id="screeningTime" name="screeningTime" required>

						<button type="submit" name="screening-sub" value="Submit">Add</button>
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