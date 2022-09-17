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
    include('faculty_navbar.php');
    include_once 'dbconnect.php';
    $project_id = $_POST['project_id'];

    $sql1 = "SELECT p.*,g.group_name,g.group_category FROM projects AS p JOIN groups AS g on (p.group_id=g.group_id) WHERE project_id = $project_id GROUP BY p.project_id";
    $rs1 = $conn-> query($sql1);
    $result = $rs1->fetch_array();

    
    $sql = "SELECT * FROM updates WHERE project_id = $project_id";
    $rs = $conn-> query($sql);
    
    
    ?>

    <h2><?php echo $result['project_title']; ?></h2>
    <h3>Group Name : <?php echo $result['group_name']; ?></h3>
            <h4>Group members:</h4>
            <?php
            $sql2 = "SELECT * FROM projects AS p JOIN groups AS g on (p.group_id=g.group_id) JOIN student AS s ON (g.student_id=s.student_id)  WHERE project_id = $project_id";
            $rs2 = $conn-> query($sql2); 
            while($rows1=mysqli_fetch_array($rs2)) 
                                { 
                                    ?>
                                     <?php echo $rows1['student_id']; ?> <?php echo $rows1['name']; ?> <br>


                                <?php
                                }?>
    <table align="center" style="width:90%; line-height:200%;"> 
	<tr> 
		
		</tr> 
			  <th>Update no </th> 
              <th>Description</th> 
              <th>Feedback </th>
              <th>Status</th>
              <th>Update file</th> 
              <th>Add comment/feedback</th> 
              <th>Change status</th> 
            </tr>
      <?php      
    while($rows=mysqli_fetch_array($rs)) 
	{?> 
    <tr> 
        <td><?php echo $rows['update_no']; ?></td> 
        <td><?php echo $rows['description']; ?></td> 
        <td><?php echo $rows['feedback']; ?></td> 
        <td><?php echo $rows['status']; ?></td> 
        <td><a href="filedownload.php?link=<?php echo $rows['file']; ?>"><?php echo $rows['file']; ?></a></td>
        <td>
                <form name = "comment_update" action="api/update_comment.php" method="post">
                    <input type="textfield" name="feedback" >
                    <input type="hidden" name="project_id" id="project_id" value="<?php echo $rows['project_id']; ?>">
                    <input type="hidden" name="update_no"  id="update_no" value="<?php echo $rows['update_no']; ?>">
                    
                    
                <input type="submit" class="btn btn-primary" name = "submit" value="Update Feedback">
                </form>
            </td>
        
            <!---- Script -->

           
        <td>
        <form name="update_status" action="api/update_status.php" method="post">
                    <input type="hidden" name="project_id" id="project_id" value="<?php echo $rows['project_id']; ?>">
                    <input type="hidden" name="update_no"  id="update_no" value="<?php echo $rows['update_no']; ?>">
                        <select name="status_update" class="form-select">
                            <option selected>Open this select menu</option>
                            <option value="accepted">Accept</option>
                            <option value="declined">Decline</option>

                        </select>
                        <div class="text-center my-4">
                         <input type="submit" value="update_status"> </div>
                    </form>

            </td>

        
    </tr> 
    <?php
    }
    ?>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>   
</body>
</html>
<style>
td {
  text-align: center;
}
</style>