<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projecet Read by faculty</title>
</head>
<body>
<form action="faculty_project_read.php" method="post">
           
        
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

	$results = mysqli_query( $connect, "SELECT PROJECT_TITLE, GROUP_ID, PROJECT_DESCRIPTION,CATEGORY
    FROM projects
    WHERE FACULTY_ID = $target" )


		or die("Can not execute query");

	echo "<table align='center' border='1px' style='width: 800; line-height: 40px;'> \n";
    
	echo "<th>Project Title</th>
          <th>Group ID</th>
          <th>Description</th>
          <th>Comment</th>
          
           \n";
           


	while( $rows = mysqli_fetch_array( $results ) ) {
		extract( $rows );
		echo "<tr>";
		echo "<td> $PROJECT_TITLE </td>";
		echo "<td> $GROUP_ID </td>";
		echo "<td> $PROJECT_DESCRIPTION </td>";
		echo "<td> <a href = 'make_comment.php?project_title=$PROJECT_TITLE
		                                            &group_id=$GROUP_ID
													&project_description=$PROJECT_DESCRIPTION'>
													Comment </a> </td>";
		

		
		echo "</tr> \n";
	}

	echo "</table> \n";
   
    }
   
   

?>
