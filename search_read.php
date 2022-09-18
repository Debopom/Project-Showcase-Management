<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Document</title>

  <link rel="stylesheet" href="search_css.css">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
  


<?php

include("dbconnect.php");

if(isset($_POST['input'])){
     $input = $_POST['input'];

    //  $query = "SELECT project_id,project_title,description,category FROM projects WHERE category LIKE '{$input}%'";
     $query = "SELECT *
     FROM projects
     JOIN groups
     ON projects.group_id=groups.group_id
     JOIN student
     ON student.student_id =groups.student_id
     WHERE student.student_id
                LIKE '{$input}%'";

     $result = mysqli_query($connect, $query);
     if(mysqli_num_rows($result) > 0){?>

     <br><br><br>
 <div id="table_container">

  
<div id="table_search">



<table id="table_main" class="table">
  <thead class="table-dark">
    <tr id="table_row">
      <th>Student ID</th>
      <th>Student Name</th>
      <th>Project Title</th>
      <th>Description</th>
      <th>Category</th>
    </tr>
  </thead>

  <tbody>


    <?php


        while($row = mysqli_fetch_assoc($result)){

                $student_id = $row['student_id'];
                $name = $row['name'];
                $project_title = $row['project_title'];
                $description = $row['description'];
                $category = $row['group_category'];
        }

                ?>

<tr >
    <td><?php echo $student_id;?> </td>
    <td><?php echo $name;?> </td>
    <td><?php echo $project_title;?> </td>
    <td><?php echo $description;?> </td>
    <td><?php echo $category;?> </td>
</tr>

                

        <!-- } -->
    <!-- ?> -->
  </tbody>
</table>

</div>

</div> 
<?php

    }else{
        echo "<h6 class='text-danger text-center mt-3'>No data found</h6>";
     }

}



?>



</body>
</html>



