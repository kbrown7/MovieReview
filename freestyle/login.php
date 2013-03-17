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
			<p class="slogan">Please enter your user information to login!</p> 
			<?php
			if (!isset($_COOKIE['login'])){
				if (isset($_POST['username'])) {
			echo "<h3>Incorrect Username/Password</h3>";
			}}
			?>
            <form method="post" action="login.php">
			 
			<p>
			<br>
			<label for="username">Username:</label>
			<input type="text" id="username" name="username" size="40" </p>
			<p>
			<br>
			 <label for="password">Password:</label>
			<input type="text" id="password" name="password" size="40" </p>
		 <br/>
			<TD><FORM METHOD="post" ACTION="login.php">
			<INPUT TYPE="submit" VALUE="Login">
			</FORM></TD>
			<TD><FORM METHOD="LINK" ACTION="logout.php">
			<INPUT TYPE="submit" VALUE="Logout">
			</FORM></TD>

			
		<br>
		
	
		</div></center>
        
       

		<div class="col c5 alignjustify">
		<?php
		
		//setcookie('loggedin','true',time()*60*60*24*7);
		
  	include "db_connect.php";
  	   if (isset($_POST['username'])){
  	     $name = $_POST['username'];
         $pw = $_POST['password'];
		
         $query = "select * from users WHERE user_name = '$name' AND password = SHA('$pw')";
         $result = mysqli_query($db, $query)
         or die("Error Querying Database");
         if ($row = mysqli_fetch_array($result))
         {
   		setcookie('login', $name, time()+3600*24, '/');
	//	echo $_COOKIE['login'];
	  	echo '<META http-equiv="refresh" content="0;URL=writeReview.php">';

       }}
?>	
            
            
		</div>
	</div>

	</div>
</body>
</html>
