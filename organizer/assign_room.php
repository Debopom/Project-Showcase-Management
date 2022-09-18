<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="navbar.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="../css/table_style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">


<script>
function getData() {
    var category = document.getElementById("category").value; 
    console.log("GET","organizer_api.php?category="+category);
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("data").innerHTML = this.responseText;

      }
    };
    xmlhttp.open("GET","organizer_api.php?category="+category,true);
    xmlhttp.send();

    
  
}
// setInterval(function(){
// 	getData();
// 	// 1sec
// },1000);
    
</script>
</head>
<body>

<?php include 'organizer_nav.php';
include 'dbconnect.php';
if(isset($_POST['submit'])){
    
    $project_id = $_POST['project_id'];
    $room_number = $_POST['room_number'];
    $sql = "UPDATE projects SET room_number = $room_number WHERE project_id = $project_id ";
    $rs = $conn-> query($sql);
    if($rs){
        echo "<script>alert('Room assigned');</script>";
        echo "<script>window.close();</script>";
    }
    
    
}?>

<label for="group_category">Category: </label>

                            <select class="custom-select custom-select-sm" id="category" onchange = 'getData()'>
                                <option value="Electronics">Electronics</option>
                                <option value="Software">Software</option>
                                <option value="DBMS">DBMS</option>
                                <option value="CN">CN</option>
                            </select>


<div id="data"></div>

<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
<style>
  <style>
    tr.>td {
  padding-bottom: 5em;
}
</style>
</style>
</html>