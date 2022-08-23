<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projecet Read</title>
</head>
<body>
<form action="project_read.php" method="post">
           
        
            <div>Search</div>
            <input type="text" name="target" required><br><br>
            
            <input type ="submit" value="Confirm" name="submit"><br><br>
            
        </form>
</body>
</html>

<?php
   
   if(isset($_POST['submit'])){
     
      $target=$_POST['target'];
      
      
	require_once('dbconnect.php');
	$connect = mysqli_connect( HOST, USER, PASS, DB )
		or die("Can not connect");

	$results = mysqli_query( $connect, "SELECT PROJECT_TITLE, GROUP_ID, CATEGORY
    FROM projects
    WHERE GROUP_ID= $target" )


		or die("Can not execute query");

	echo "<table align='center' border='1px' style='width: 800; line-height: 40px;'> \n";
    
	echo "<th>Project Title</th>
          <th>Group ID</th>
          <th>Category</th>
           \n";
           


	while( $rows = mysqli_fetch_array( $results ) ) {
		extract( $rows );
		echo "<tr>";
		echo "<td> $PROJECT_TITLE </td>";
		echo "<td> $GROUP_ID </td>";
		echo "<td> $CATEGORY </td>";
		

		
		echo "</tr> \n";
	}

	echo "</table> \n";
   
    }
   
   

?>
