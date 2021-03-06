<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="ajax.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	 <link rel="stylesheet" type="text/css" href="styles/tables.css" >        
    <title>Fan Stats Page</title>

</head>
<body>
    <?php
    include_once 'DataBaseCon.inc';
    
      if(isset($_POST['fanTemp'])){
         $fanTempLimit = $_POST['fanTemp'];
         if(!preg_match('/[0-9]{1,2}/',$fanTempLimit)) {
            echo "<p>Fan Temp Isnt A valid number (must be 1 or 2 digits)</p>"; 
         } else {
         	$conn= @mysqli_connect($host, $user, $pwd, $sql_db);
         	if(!$conn) {
           	 echo "<p>Database Connection Failed</p>";
            } else {
            	$query = "update TempLimit set TempLimit = '$fanTempLimit' Where temp_id = 1;";
               mysqli_query($conn, $query);	
            }
				
            if (!$query){
           		echo 'could not run query: '. mysql_error();
           	}
				//table print
			 echo "<table border=\"2\">\n";
			 echo "<tr>\n "
	 		."<th scope=\"col\">Current Temperature</th>\n "
	 		."<th scope=\"col\">Temperature Limit</th>\n "
	 		."<th scope=\"col\">Fan Status</th>\n "
	 		."</tr>\n ";
	 		
	 		echo "<tr>\n";
	 		echo "<td id=\"CurrentTemp\"></td>\n" ;  
			
			
         //Print Temperature Limit
			$query = "SELECT TempLimit FROM TempLimit ORDER BY temp_id DESC LIMIT 1";        
			$result = mysqli_query($conn, $query); 
			
         while ($row = mysqli_fetch_assoc($result))
         {
			echo "<td>",$row["TempLimit"],"</td>\n";   
         }
         echo "<td id=\"FanStatus\"></td>\n" ;  
			echo "</tr>\n";   
		
			include_once 'Weather.php';
             
         }
          mysqli_close($conn);
        }
       
       
    ?>
    
    <br />
    
    <a id="back" href="index.html">Back To Index</a>
    
    <br />

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
