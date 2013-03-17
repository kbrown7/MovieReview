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
			<h1><a class="red" href="index.php">Movie Ratings</a></h1>
			<form method="post" action="actorsResults.php">
			<p class="slogan">Lead Actors & Actresses</p>
		<label for="search">Search:</label>
		<input type="text" id="search" name="search" size="40" </p>
		<input type="submit" value="Go" name="submit" /></p>
		
		</div>
	</div>
		
	<div class="row">
	
		<div class="col c2">
			<ul class="menu">
				<li><a href="index.php">Home</a></li>
				<li><a href="topmovies.php">Top Movies</a></li>
				<li><a href="actors.php">Actors</a></li>
				<li><a href="genre.php">Genre</a></li>
				<li><a href="ratings.php">New Ratings</a></li>
				<li><a href="mpaa.php">MPAA Ratings</a></li>
			</ul>
		</div>
						
		<div class="col c5 alignjustify">
		
			<h2>Movies by Actors</h2>
			<TABLE  BORDER="2" align="center" width="100%" cellpadding="4" cellspacing="3">
   				<TR align="center">
      				<TH COLSPAN="2">
         				<H3><BR>Actors</H3>
      				</TH>
   				</TR>
      				<TH align="center">Movie</TH>
      				<TH align="center">Lead Actor</TH>
                <?php
                include "db_connect.php";
                
				$query = "SELECT movie_title, lead_actor FROM movie ORDER BY REVERSE(SUBSTRING_INDEX(REVERSE(lead_actor),' ',1))";
                
				$result = mysqli_query($db, $query);
				
				while($row = mysqli_fetch_array($result)) {
					$movie = $row['movie_title'];
  					$actor = $row['lead_actor'];	
					echo "<TR align=\"center\">";
					echo "<TD>".$movie."</TD>";
					echo "<TD>".$actor."</TD>";
					echo "</TR>";
				}
				

				
                ?>
			</TABLE>
			</div>

		<div class="col c5 alignjustify">
			<h2>Movies by Actresses</h2>
			<TABLE  BORDER="2" align="center" width="100%" cellpadding="4" cellspacing="3">
   				<TR align="center">
      				<TH COLSPAN="2">
         				<H3><BR>Actresses</H3>
      				</TH>
   				</TR>
      				<TH align="center">Movie</TH>
      				<TH align="center">Lead Actress</TH>
                <?php
                include "db_connect.php";
                
				$query = "SELECT movie_title, lead_actress FROM movie ORDER BY REVERSE(SUBSTRING_INDEX(REVERSE(lead_actress),' ',1))";
               	$result = mysqli_query($db, $query);
				
				while($row = mysqli_fetch_array($result)) {
					$movie = $row['movie_title'];
  					$actress = $row['lead_actress'];	
					echo "<TR align=\"center\">";
					echo "<TD>".$movie."</TD>";
					echo "<TD>".$actress."</TD>";
					echo "</TR>";
				}
				

				
                ?>
			</TABLE>
		</div>
	</div>

	<div class="row separator">
	</div>

	
</div>
</body>
</html>
