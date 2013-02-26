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
			<h1><a class="red" href="index.html">Movie Ratings</a></h1>
			<p class="slogan">Actors</p>
		</div>
	</div>
		
	<div class="row">
	
		<div class="col c2">
			<ul class="menu">
				<li><a href="index.html">Home</a></li>
				<li><a href="topmovies.html">Top Movies</a></li>
				<li><a href="actors.php">Actors</a></li>
				<li><a href="genre.php">Genre</a></li>
				<li><a href="ratings.html">New Ratings</a></li>
				<li><a href="mpaa.php">MPAA Ratings</a></li>
			</ul>
		</div>
		
		<center><div>
			<h2>Search Results</h2>
			 <?php
                $search =  "This page displays search results for " . $_POST['search'];
				echo $search;
			?>	
			<TABLE  BORDER="2" align="center" width="75%" cellpadding="4" cellspacing="3">
   				<TR align="center">
      				
   				</TR>
      				<TH align="center">Movie</TH>
      				<TH align="center">Lead Actor</TH>
					<TH align="center">Lead Actress</TH>
                <?php
                include "db_connect.php";
                 if (isset($_POST['search']))
				{
				$searchterm = mysqli_real_escape_string($db, trim($_POST['search']));
				$query = "SELECT movie_title,lead_actor,lead_actress FROM movie where lead_actor LIKE '%$searchterm%' OR lead_actress LIKE '%$searchterm%'";
               	$result = mysqli_query($db, $query);
				while($row = mysqli_fetch_array($result)) {
					$movie = $row['movie_title'];
  					$actor = $row['lead_actor'];	
					$actress = $row['lead_actress'];	
					echo "<TR align=\"center\">";
					echo "<TD>".$movie."</TD>";
					echo "<TD>".$actor."</TD>";
					echo "<TD>".$actress."</TD>";
					echo "</TR>";
				}
				}

							
                ?>
			</TABLE>
            
            
		</div></center>
        
        

		<div class="col c5 alignjustify">
			
            
            
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
