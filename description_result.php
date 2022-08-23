<html>
	<head><title>Description</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">

	</head>

	<style>
h2 {
  text-align: left;
}
</style>

	<body>
		
		
 

<?php

 
	$group_id= $_GET["GROUP_ID"];

	$project_description= $_GET["PROJECT_DESCRIPTION"];
	


	require_once('dbconnect.php');

	$connect = mysqli_connect( HOST, USER, PASS, DB )

		or die("Can not connect");

	$query 	= "UPDATE projects SET
								 GROUP_ID='$group_id',
								 PROJECT_DESCRIPTION='$project_description'
								 WHERE GROUP_ID='$group_id'";

	//echo $query;



	mysqli_query( $connect, $query )

		or die("Can not execute query");

                        echo"<h2 class='ui header' >Project Description Added</h2>";
	

    echo "<p><a href=project_read.php> <button class='ui primary button'>
    READ ALL RECORDS </button> </a></p>";
    ?>

    </body>
    </html>