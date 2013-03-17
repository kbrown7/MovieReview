<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="Your description goes here" />
	<meta name="keywords" content="your,keywords,goes,here" />
	<meta name="author" content="Your Name" />
	<link href='http://fonts.googleapis.com/css?family=Economica' rel='stylesheet' type='text/css' />
	<link rel="stylesheet" type="text/css" href="freestyle.css" title="The Grid" media="all" />
	<title>Top Movies</title>
</head>

<body class="wider orange">
<div id="layout">

	<div id="header" class="row">
		<div class="col c12 aligncenter">
			<h1><a class="red" href="index.php">Top Movies</a></h1>
			<p class="slogan">Movie Ratings</p>
			<form method="post" action="topmovies.php">
            <label for="search">Search:</label>
			<input type="text" id="search" name="search" size="1" </p>
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
	
			<center><div>
			<h2>Top Movies</h2>
			<p></p>
            <TABLE  BORDER="2" align="center" width="50%" cellpadding="4" cellspacing="3">
   				<TR align="center">
      				<TH COLSPAN="2">
         				<H3><BR>Movie Ratings</H3>
      				</TH>
   				</TR>
      				<TH align="center">Movie</TH>
      				<TH align="center">Rating</TH>
                <?php
                include "db_connect.php";
				
				if (isset($_POST['search'])){
					
					$searchterm = mysql_real_escape_string($_POST['search']);
					$query = "SELECT m.movie_title, r.rating FROM movie AS m INNER JOIN ratings AS r ON m.id = r.movie WHERE r.rating LIKE '$searchterm' ORDER BY r.rating DESC";
					$result = mysqli_query($db, $query); 
					
					while($row = mysqli_fetch_array($result)) {
						$movie = $row['movie_title'];
  						$rating = $row['rating'];	
						echo "<TR align=\"center\">";
						echo "<TD>".$movie."</TD>";
						echo "<TD>".$rating."</TD>";
						echo "</TR>";
					}
					
				}//end if
				
				
				
				
				else{
                
				$query = "SELECT m.movie_title, r.rating FROM movie AS m INNER JOIN ratings AS r ON m.id = r.movie ORDER BY r.rating DESC";
                
				$result = mysqli_query($db, $query);
				
				while($row = mysqli_fetch_array($result)) {
					$movie = $row['movie_title'];
  					$rating = $row['rating'];	
					echo "<TR align=\"center\">";
					echo "<TD>".$movie."</TD>";
					echo "<TD>".$rating."</TD>";
					echo "</TR>";
				}
				
				}//end else
				
                ?>
                
			</TABLE>
            
            
		</div></center>
	
	<div id="footer" class="row">
		<div class="col c12">
			<p>&copy; 2012 Your Name<br />
			<a href="http://andreasviklund.com/templates/freestyle/">Template design</a> by <a href="http://andreasviklund.com/">Andreas Viklund</a><br /><span class="smaller">Best hosted at <a href="https://www.svenskadomaner.se/?ref=mall&amp;ling=en" title="Svenska Domäner AB">www.svenskadomaner.se</a></span></p>
		</div>
	</div>
</div>
</body>
</html>
