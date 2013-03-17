<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
	if(!isset ($_COOKIE['login'])){
	exit;
	} 
   
 	?>

<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="Your description goes here" />
	<meta name="keywords" content="your,keywords,goes,here" />
	<meta name="author" content="Your Name" />
	<link href='http://fonts.googleapis.com/css?family=Economica' rel='stylesheet' type='text/css' />
	<link rel="stylesheet" type="text/css" href="freestyle.css" title="The Grid" media="all" />
	<title>Movie Ratings</title>
</head>

<body class="wider orange">
<div id="layout">

	
	<div class="row">
	
		<div class="col c2">
			<ul class="menu"> 
				<br>
				<br>
				<li><a href="index.php">Home</a></li>
				<li><a href="topmovies.php">Top Movies</a></li>
				<li><a href="actors.php">Actors</a></li>
				<li><a href="genre.php">Genre</a></li>
				<li><a href="ratings.php">New Ratings</a></li>
				<li><a href="mpaa.php">MPAA Ratings</a></li>
			</ul>
		</div>
		
		<center><div>
			 <p>
		<h1><a class="red" href="index.php">Welcome!</a></h1>
			<p class="slogan">Please enter your review</p> 
	
    
    <form method = "post" action = "writeReview.php">
					<table>
					<tr><td>Movie title</td><td><input type="text" id="tite" name="title" /></td></tr>
					
					<tr><td>Genre</td><td><input type="text" id="genre" name="genre" /></td></tr>
                    
                    <tr><td>Lead Actor</td><td><input type="text" id="actor" name="actor" /></td></tr>
                    
                    <tr><td>Lead Actress</td><td><input type="text" id="actress" name="actress" /></td></tr>
                    
                    <tr><td>MPAA</td><td><input type="text" id="mpaa" name="mpaa" /></td></tr>
                    
                    <tr><td>Run Time</td><td><input type="text" id="time" name="time" /></td></tr>
                    
                    <tr><td>Rating</td><td><input type="text" id="rating" name="rating" /></td></tr>
					
					<tr><td>Review Date</td><td><input type="number" name="month" min="1" max="12" step="1" value="1" size="3"/>
					<input type="number" name="day" min="1" max="31" step="1" value="1" size="3"/>
					<input type="number" name="year" min="2009" max="2014" step="1" value="2013" size="4"/></td></tr>
			
					
					<tr><td>Review</td><td><textarea name="review" cols="35" rows="25"></textarea></td></tr>
					
                    <tr><td>Cover Image Link</td><td><input type="text" id="image" name="image" /></td></tr>
					
					<tr><td>&nbsp;</td><td><input type="submit" value="Submit" /></td></tr>
					
					
					
					</table>
					
			</form>      
            
            
             <?php
                include "db_connect.php";
				
				if (isset($_POST['title'])){
					
					$title = mysql_real_escape_string($_POST['title']);
					$genre = mysql_real_escape_string($_POST['genre']);
					$actor = mysql_real_escape_string($_POST['actor']);
					$actress = mysql_real_escape_string($_POST['actress']);
					$mpaa = mysql_real_escape_string($_POST['mpaa']);
					$runtime = mysql_real_escape_string($_POST['time']);
					$rating = mysql_real_escape_string($_POST['rating']);
					$month = mysql_real_escape_string($_POST['month']);
					$day = mysql_real_escape_string($_POST['day']);
					$year = mysql_real_escape_string($_POST['year']);
					$date = $year . '-' . $month . '-' . $day;
					$review = mysql_real_escape_string($_POST['review']);
					$image = mysql_real_escape_string($_POST['image']);
					
					$query = "INSERT INTO movie (movie_title, genre, lead_actor, lead_actress, MPAA, run_time) VALUES ('";
					$query = $query . $title . "', '" . $genre . "', '" . $actor . "', '" . $actress . "', '" . $mpaa . "', '" . $runtime . "')";
					echo $query;
					$result = mysqli_query($db, $query)
                         or die("Error Querying Database");
						 
					$query = "SELECT id FROM movie WHERE movie_title ='" . $title . "'";
					echo $query;
					$result = mysqli_query($db, $query)
                         or die("Error Querying Database");
					$row = mysqli_fetch_array($result);
					$movieId = $row['id'];
					echo $movieId;
						 
					$query = "INSERT INTO ratings (movie, review, rating, review_date) VALUES ('";
					$query = $query . $movieId . "', '" . $review . "', '" . $rating . "', '" . $date . "')";
					echo $query;
					mysqli_query($db, $query)
                         or die("Error Querying Database");
						 
					$query = "INSERT INTO images (id, link) VALUES ('";
					$query = $query . $movieId . "', '" . $image . "')";
					echo $query;
					mysqli_query($db, $query)
                         or die("Error Querying Database");
					
					echo 'MOVIE REVIEW SUBMITTED';
					
					
					
				}

				
                ?>
            
		</div>
	</div>

	</div>
</body>
</html>
