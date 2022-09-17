<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="navbar.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <title>Project Details</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
    <?php
    session_start();

    include_once 'dbconnect.php';
     include('student_navbar.php');
        $student_id = $_SESSION['student_id'];
    
        $query2 = "SELECT * FROM groups WHERE student_id =$student_id";
        $result2 = mysqli_query($conn,$query2);

        $query3 = "SELECT * FROM faculty";
        $result3 = mysqli_query($conn,$query3);

    $sql1 = "SELECT p.*,g.group_name,g.group_category FROM projects AS p JOIN groups AS g on (p.group_id=g.group_id)JOIN student AS s ON(g.student_id=s.student_id) WHERE s.student_id =$student_id";
    $rs = $conn-> query($sql1);


    
    
    
    ?>
    <h2>Your Projects</h2>
    <div class="card text-center">

        <div class="card-body">
    
    


    
    <table align="center" style="width:90%; line-height:200%;"> 
	<tr> 
		
		</tr> 
			  <th>Project Title </th> 
              <th>Group name </th> 
              <th>Group type/ Project type </th> 
              <th>Desctiption </th>
              <th>Actions </th>  

            </tr>
      <?php      
    while($rows=mysqli_fetch_array($rs)) 
	{?> 
    <tr> 
        <td><?php echo $rows['project_title']; ?></td> 
        <td><?php echo $rows['group_name']; ?></td> 
        <td><?php echo $rows['group_category']; ?></td> 
        <td><?php echo $rows['description']; ?></td> 
        <td>
        <form name="update_status" action="api/update_status.php" method="post">
                    <input type="hidden" name="project_id" id="project_id" value="<?php echo $rows['project_id']; ?>">
                        <select name="status_update" class="form-select">
                            <option selected>Open this select menu</option>
                            <option value="add_update">Add an update</option>
                            <option value="edit_title">Edit project title</option>
                            <option value="edit_description">Edit project Description</option>


                        </select>
                        <div class="text-center my-4">
                         <input type="submit" value="Submit"> </div>
                    </form>

            </td>
        
    </tr> 
    <?php
    }
    ?>
    </table>
    </div>
  
  </div>
  <br>
    <button type="button" class="btncr btn-success btn-lg btn-block text-center" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                       Add project
                    </button>
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel"></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="ui form" style="max-width: 700px; margin:0 auto;" action="create_project.php" method ="post">
                                        <h4 class="ui dividing header">Create Project</h4>
                                        <div class="field">
                                        </div>
                                        <div class="field">
                                            <label>Project Title</label>
                                            <input type=text name="PROJECT_TITLE" placeholder="Project Title">
                                        </div>
                                        <div class="field">
                                            <label>Description</label>
                                            <textarea rows = "5" cols = "50" name = "description">
                                                
                                            </textarea>
                                        </div>
                                            
                                        <div class="field">
                                            <label>Please select group</label>
                                                <select class="custom-select custom-select-sm" name="GROUP_ID">
                                                <?php 
                    
                                                        while ($row2 = mysqli_fetch_array(
                                                                $result2,MYSQLI_ASSOC)):; 
                                                    ?>
                                                        <option value="<?php echo $row2["group_id"];
                                            
                                                        ?>">
                                                            <?php echo $row2["group_name"];
                                                            ?>
                                                        </option>
                                                    <?php 
                                                        endwhile; 
                                                     ?>
                                                    </select>
                                        </div> 
                                        <div class="field">
                                            <label>Please select faculty</label>
                                                <select class="custom-select custom-select-sm" name="FACULTY_ID">
                                                <?php 
                    
                                                        while ($row3 = mysqli_fetch_array(
                                                                $result3,MYSQLI_ASSOC)):; 
                                                    ?>
                                                        <option value="<?php echo $row3["faculty_id"];
                                            
                                                        ?>">
                                                            <?php echo $row3["faculty_name"];
                                                            ?>
                                                        </option>
                                                    <?php 
                                                        endwhile; 
                                                     ?>
                                                    </select>
                                        </div>          

                                        <div class="field">
                                            <label>category </label>
                                            <select class="custom-select custom-select-sm" name="CATEGORY">
                                                                        <option value="Electronics">Electronics</option>
                                                                        <option value="Software">Software</option>
                                                                        <option value="DBMS">DBMS</option>
                                                                        <option value="CN">CN</option>
                                                                    </select>
                                        </div>
                                            
                                            <button class="ui button" type="submit">Submit</button>
                                        </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
<style>
td {
  text-align: center;
}
</style>