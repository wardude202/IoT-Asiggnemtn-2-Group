<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="ajax.js"></script>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">  
	<link rel="stylesheet" type="text/css" href="styles/tables.css" > 
	   
	<title> IoT Game </title>
</head>
<body>
    <h1>Memory Game Project</h1>
	 <br />
	<?php
	include_once 'DataBaseCon.inc';
//connects to server

	$conn= @mysqli_connect($host, $user, $pwd, $sql_db);
		if (!$conn) 
		{
			echo "<p>Database Connection Failure</p>";
		} 
		else 
		{
			$query = "SELECT * FROM players;";
			$result = mysqli_query($conn, $query);
  		} 
  		if(!$result) 
  		{
			echo "<p>Something is wrong with ", $query, "</p>";
		} 
		else 
		{
			echo "<h2>Player List</h2>";
  			echo "<table border=\"2\">\n";
			echo "<tr>\n "
			."<th scope=\"col\">Player ID</th>\n "
	  		."<th scope=\"col\">Current Level</th>\n "
			."</tr>\n ";

			while ($row = mysqli_fetch_assoc($result))
			{
				echo "<tr>\n";
				echo "<td>",$row["player_id"],"</td>\n";
				echo "<td>",$row["current_level"],"</td>\n";
				echo "</tr>\n ";
			}
			echo "</table>\n ";
			mysqli_free_result($result);
		}
		mysqli_close($conn);
	?>
	<br />
	<a href="index.html">Back To Index</a>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
  </body>
 
</html>