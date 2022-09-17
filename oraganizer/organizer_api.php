<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/table_style.css">

</head>
<body>
<?php
error_reporting(0);
session_start();
ini_set('display_errors', 0);
$category = $_GET['category'];
include_once 'dbconnect.php';

    
    
    $sql = "SELECT p.*,g.group_name,g.group_category FROM projects AS p JOIN groups AS g on (p.group_id=g.group_id) WHERE p.category = '$category' GROUP BY marks DESC ";
    $rs = $conn-> query($sql);
    
    
        
       
		
		
    if(mysqli_num_rows($rs) > 0){?>
    <section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section"></h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						
					   

                                <table class="table" align="center" style="width:90%; line-height:200%;"> 
                                <thead class="thead-primary">
                                <tr> 
                                    <th colspan="6"><h2>Projects</h2></th> 
                                    </tr> 
                                        <th>Project Title </th> 
                                        <th>Description</th> 
                                        <th>Category </th>
                                        <th>Marks</th>
                                        <th>Room no</th>  
                                        <th></th> 
                                        

                                            
                                    </tr>
                                    </thead>
					                <tbody>
                                    <?php
                                    while($rows=mysqli_fetch_array($rs)) 
                                {

                                        $project_id = $rows['project_id'];
                                        

                                        $sql1 = "SELECT p.*,g.group_name,g.group_category FROM projects AS p JOIN groups AS g on (p.group_id=g.group_id) WHERE project_id = $project_id GROUP BY p.project_id";
                                        $rs1 = $conn-> query($sql1);
                                        $result = $rs1->fetch_array();
                                    ?>
                                    <tr> 
                                    <td class="border-bottom-0"><?php echo $rows['project_title']; ?></td> 
                                    <td class="border-bottom-0"><?php echo $rows['description']; ?></td> 
                                    <td class="border-bottom-0"><?php echo $rows['category'];  ?></td>
                                    <td class="border-bottom-0"><?php echo $rows['marks'];  ?></td>
                                    <td class="border-bottom-0">
                                    <form name = "confirm" action="assign_room.php" method="post">

                                        <input type="hidden" name="project_id" value="<?php echo $rows['project_id'];  ?>">

                                                <input type="text" name="room_number" value="<?php echo $rows['room_number'];  ?>">
                                                
                                                
                                            <input type="submit" formtarget="_blank" class="btn btn-primary" name = "submit" value="Assing room">
                                        
                                    
                                    </td>
                                    <td class="border-bottom-0">
                                        <button type="button" class="btncr btn-success btn-lg btn-block text-center" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        Project Details
                                        </button>
                                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel"></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
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
                                                                    </tr>
                                                            <?php      
                                                            while($rows=mysqli_fetch_array($rs)) 
                                                            {?> 
                                                            <tr> 
                                                                <td><?php echo $rows['update_no']; ?></td> 
                                                                <td><?php echo $rows['description']; ?></td> 
                                                                <td><?php echo $rows['feedback']; ?></td> 
                                                                <td><?php echo $rows['status']; ?></td> 
                                                                
                                                                
                                                            </tr> 
                                                            <?php
                                                            }
                                                            ?>
                                                            </table>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </td>
                                    

                                    
                                    </tr>
                                    
                                    
                                <?php
                                    }?>
                                    </tbody>
                                </table>

                                <?php
                            }
                            else{
                                echo"<h1> No data found!";
                            }
                            ?>
                            </div>
				</div>
			</div>
		</div>
	</section>
    <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
    
</body>
<style>
    tr.>td {
  padding-bottom: 5em;
}
</style>
</html>