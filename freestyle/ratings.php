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
</head>

<body class="wider orange">
<div id="layout">

	<div id="header" class="row">
		<div class="col c12 aligncenter">
			<h1><a class="red" href="index.php">Movie Reviews</a></h1>
			<p class="slogan">Ratings</p>
		</div>
	</div>
		
	<div class="row">
	
		<div class="col c2">
			<ul class="menu">
				<li><a href="index.php">Home</a></li>
				<li><a href="topmovies.php">Top Movies</a></li>
				<li><a href="actors.php">Actors</a></li>
				<li><a href="genre.php">Genre</a></li>
				<li><a href="ratings.php">New Reviews</a></li>
				<li><a href="mpaa.php">MPAA Ratings</a></li>
			</ul>
		</div>
		
	<div class="col c5 alignjustify">
		
			<h2>Most Recent Movie Reviews</h2>
			<TABLE  BORDER="3" align="center" width="100%" cellpadding="4" cellspacing="4">
   				<TR align="center">
      				<TH COLSPAN="3">
         				<H3><BR>Reviews!</H3>
      				</TH>
   				</TR>
      				<TH align="center">Movie</TH>
      				<TH align="center">Review</TH>
      				<TH align="center">Rating</TH>
                <?php
                include "db_connect.php";
                
				$query = "SELECT movie.movie_title, ratings.rating, ratings.review FROM ratings JOIN movie WHERE movie.id = ratings.movie ";
                
				$result = mysqli_query($db, $query);
				
				while($row = mysqli_fetch_array($result)) {
					$movie = $row['movie_title'];
  					$review = $row['review'];	
  					$rating = $row['rating'];	
					echo "<TR align=\"center\">";
					echo "<TD>".$movie."</TD>";
					echo "<TD>".$review."</TD>";
					echo "<TD>".$rating."</TD>";
					echo "</TR>";
				}
				

				
                ?>
			</TABLE>
			</div>



	</div>
</div>
</body>
</html>
