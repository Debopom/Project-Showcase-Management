<html>
	<head><title>Feedbak Submission</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">

	</head>

	<style>
h2 {
  text-align: left;
}
</style>

	<body>
		
		<h2 class="ui header" >Feedback Submitted</h2>

<?php

	// //$course_code= $_GET["COURSE_CODE"];
	// $project_title= $_GET["PROJECT_TITLE"];
	$group_id= $_GET["GROUP_ID"];
	// // $marks= $_GET["MARKS"];
	// // $room_no= $_GET["ROOM_NO"];
	// // $project_description= $_GET["PROJECT_DESCRIPTION"];
	// $category= $_GET["CATEGORY"];
	$faculty_feedback= $_GET["FACULTY_FEEDBACK"];
    

	require_once('dbconnect.php');

	$connect = mysqli_connect( HOST, USER, PASS, DB )
		or die("Can not connect");

	mysqli_query( $connect, "UPDATE projects SET

    FACULTY_FEEDBACK='$faculty_feedback'
    WHERE GROUP_ID='$group_id'" )




		or die("Can not execute query");


	//echo "<br> Course Title = $course_name 
						  //<br> Department ID = $department_id ";

	

	echo "<p><br><a href=project_read.php> <button class='ui primary button'>
                                VIEW RECORD </button> </a></p>";


    ?>

</body>
</html>
