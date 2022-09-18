<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>show project</title>
</head>
<body>
    <?php 
     

     session_start();
     include('faculty_navbar.php');
     $faculty_id = $_SESSION['faculty_id'];
     

     include_once 'dbconnect.php';
     $sql = "SELECT p.*,g.group_name,g.group_category FROM projects AS p JOIN groups AS g on (p.group_id=g.group_id) WHERE faculty_id = $faculty_id  GROUP BY p.project_id";
    ?>
    <br><br>
    
    <section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Projects</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
					
					    <thead class="thead-primary">

                            <table class="table" align="center" style="width:90%; line-height:200%;"> 

     
    
        
                                            <th>Project Title </th> 
                                            <th>Description</th> 
                                            <th>Category </th>
                                            <th></th> 
                                            <th></th> 

                                                
                                        </tr> 
                                        </thead>
                                                    <tbody>
                                        
                                    
                                
                                        <?php
                                            $rs = $conn-> query($sql); 
                                            
                                        while($rows=mysqli_fetch_array($rs)) 
                                        { 
                                            $project_id = $rows['project_id'];
                                        ?>
                                        
                                        <tr> 
                                        <td><?php echo $rows['project_title'];  ?></td> 
                                        <td><?php echo $rows['description']; ?></td> 
                                        <td><?php echo $rows['category'];  ?></td> 
                                            <td>
                                                <form name = "confirm" action="project_details_faculty.php" method="post">
                                                    <input type="hidden" name="project_id" value="<?php echo $rows['project_id']; ?>">
                                                    
                                                    
                                                <input type="submit" class="btn btn-primary" name = "submit" value="Show Project details">
                                        </form>
                                        </td>
                                        <td>

                                                <form name = "confirm" action="delete_project.php" method="post">
                                                    <input type="hidden" name="project_id" value="<?php echo $rows['project_id']; ?>">
                                                    
                                                    
                                                <input type="submit" class="btn btn-primary" name = "submit" value="Delete Project">
                                            </form>
                                            </td>
                                        </tr>
                                        
                                
                            

                                    
                                    
                                <?php
                                    }?>
                                
                            </tbody>
					  </table>
					</div>
				</div>
			</div>
		</div>
	</section>
    
 
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>