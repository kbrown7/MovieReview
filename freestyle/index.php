<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="Your description goes here" />
	<meta name="keywords" content="your,keywords,goes,here" />
	<meta name="author" content="Your Name" />
	<link href='http://fonts.googleapis.com/css?family=Economica' rel='stylesheet' type='text/css' />
	<link rel="stylesheet" type="text/css" href="freestyle.css" title="The Grid" media="all" />
	
<title>Movie Ratings</title>
<style type="text/css">
#apDiv1 {
	position:absolute;
	left:920px;
	top:350px;
	width:197px;
	height:259px;
	z-index:1;
}
</style>
</head>

<body class="wider">
<div id="layout">

	<div id="header" class="row">
		<div class="col c6">
			<h1><a class="red" href="index.php">Movie Ratings</a></h1>
			<p class="slogan"></p> Welcome! <p>
			<?php
			if(isset($_COOKIE['login'])){
			 echo "You are logged in as " . $_COOKIE['login'];
			}
			?>
		</div>
		
		<div class="col c2">
			<ul class="menu">
				<li><a href="login.php">Login/Logout</a></li>
				<li><a href="genre.php">Genre</a></li>
			</ul>
		</div>

		<div class="col c2">
			<ul class="menu">
				<li><a href="topmovies.php">Top Movies</a></li>
				<li><a href="ratings.php">New Reviews</a></li>
			</ul>
		</div>

		<div class="col c2">
			<ul class="menu">
				<li><a href="actors.php">Actors</a></li>
				<li><a href="mpaa.php">MPAA Ratings</a></li>
			</ul>
		</div>
</div>
	
	<div class="row">
		<div class="col c6">
		  <img src="images/film-reel.jpg" width="540" alt="" />
		</div>
		
		<div class="col c6 alignjustify">
			<p> Here you will find the most accurate movie ratings on the web!
			</p>
            <form method="post" action="index.php">
            <label for="search">Search Movie:</label>
			<input type="text" id="search" name="search" size="40" /> 
			<input type="submit" value="Go" name="submit" /></p>
            

                <?php
                include "db_connect.php";
				
				if (isset($_POST['search'])){
					
					$searchterm = mysql_real_escape_string($_POST['search']);
					$query = "SELECT movie.movie_title, movie.genre, movie.lead_actor, movie.lead_actress, movie.MPAA, movie.run_time, ratings.review, ratings.rating, images.link FROM movie LEFT JOIN ratings ON movie.id=ratings.movie LEFT JOIN images ON images.id=movie.id WHERE movie.movie_title = '$searchterm'";
					$result = mysqli_query($db, $query); 
					while($row = mysqli_fetch_array($result)) {
						$movie = $row['movie_title'];
  						$genre = $row['genre'];	
						$leadactor = $row['lead_actor'];
						$leadactress = $row['lead_actress'];
						$mpaa = $row['MPAA'];
						$runtime = $row['run_time'];
						$review = $row['review'];
						$rating = $row['rating'];
						$image = $row['link'];
						echo "<h2>".$movie."</h2></p>";
						echo "<h3>Genre:</h3> ".$genre;
						echo "<h3>Lead Actor:</h3> ".$leadactor;
						echo "<h3>Lead Actress:</h3> ".$leadactress;
						echo "<h3>MPAA & Runtime:</h3> ".$mpaa."</p>".$runtime."min";
						echo "<h3>Rating:</h3> ".$rating." /10";
						echo "<h3>Review:</h3> ".$review;
						echo "<div id=\"apDiv1\"><img src=\"".$image."\"></div>";
					
					}
					
				}//end if
				
	
				
                ?>

            
            
            
		</div>
	</div>
	
	<div class="row separator">
	</div>
	


	<div id="footer" class="row">
		<div class="col c12">
			<p>&copy; 2012 Your Name<br />
			<a href="http://andreasviklund.com/templates/freestyle/">Template design</a> by <a href="http://andreasviklund.com/">Andreas Viklund</a><br /><span class="smaller">Best hosted at <a href="https://www.svenskadomaner.se/?ref=mall&amp;ling=en" title="Svenska Domäner AB">www.svenskadomaner.se</a></span></p>
		</div>
	</div>
</div>
</body>
</html>
