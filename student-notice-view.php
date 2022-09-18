<?php
// session_start();
require 'dbcon.php'
  
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container mt-4">
      
      <div class="row">
        <div class="col-md-12">
            <div class="card">
               <div class="card-header">
                <h4>Notice Board
                  <a href="student_dashboard.php" class="btn btn-success float-end">Back</a>
                </h4>
               </div>
               <div class="card-body">
                 <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                    <th>SL</th>
                      <th>Notice</th>
                      <th>Course</th>
                      <th>Date</th>
    
                      <!-- <th>Action</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $query = "SELECT * FROM notice";
                    $query_run = mysqli_query($con ,$query);
                    if(mysqli_num_rows($query_run)> 0){
                      foreach($query_run as $notice){
                        
                        ?>
                        <tr>
                      <td><?= $notice['sl'] ?></td>
                      <td><?= $notice['notice'] ?></td>
                      <td><?= $notice['course'] ?></td>
                      <td><?= $notice['date'] ?></td>
                      <td>
                      <!-- <a href="student-view.php?id=<?= $students['id']; ?>" class="btn btn-info btn-sm">View</a> -->
                        <!-- <a href="editnotice.php?id=<?= $notice['sl']; ?>" class="btn btn-success btn-sm">Edit</a> -->
                         
                        <!-- <form action="code.php" method="POST" class="d-inline">

                           <button type="submit" name="delate_student" value="<?=$student['id']?>"  class="btn btn-danger btn-sm">Delete</button>

                        </form> -->
                      </td>

                     </tr>

                        <?php
                      }

                    }else{
                      echo "<h5> No record Found </h5>";
                    }

                     ?>
                      
                  </tbody>

                   </table>
               </div>
            </div>
        </div>
      </div>
    </div>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

     
  </body>
</html>