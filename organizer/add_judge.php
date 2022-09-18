<?php

session_start();
include 'dbconnect.php';
if (isset($_POST['delete'])){
    $judge_id = $_POST['judge_id'];
    $query3 = "DELETE FROM judge WHERE judge_id =$judge_id";
    $result3 = mysqli_query($conn, $query3);

} 

if (isset($_POST['add'])) {
    
    $id = $_POST['id'];
    $password = $_POST['password'];
    $assigned_to = $_POST['assigned_to'];
    $category = $_POST['category'];


    $query2 = "INSERT INTO judge (judge_id, password, category, assigned_to) VALUES ($id, '$password', '$category', '$assigned_to')";
    $result2 = mysqli_query($conn, $query2);
}
?>

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

    include('organizer_nav.php');

    $query2 = "SELECT * FROM judge";
    $result2 = mysqli_query($conn, $query2);?>
<div class="d-flex justify-content-center">

<div class="w-75 p-3 " style="background-color: #eee;" >
<button type="button" class="btncr btn-success btn-lg btn-block text-center" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                       Add a judge
                    </button>
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel"></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="ui form" style="max-width: 700px; margin:0 auto;" action="add_judge.php" method ="post">
                                        <h4 class="ui dividing header">Add a judge</h4>
                                        <div class="field">
                                        </div>
                                        <div class="field">
                                            <label>ID</label>
                                            <input type ="text" name = "id">
                                                
                                            
                                        </div>
                                        <div class="field">
                                            <label>Password</label>
                                            <input type ="text" name = "password">
                                                
                                            
                                        </div>
                                        <div class="field">
                                            <label>Assigned to</label>
                                            <input type ="text" name = "assigned_to">
                                                
                                            
                                        </div>
                                        <div class="field">

                                            <label for="group_category">Category: </label>

                                                <select class="custom-select custom-select-sm" name="category">
                                                    <option value="Electronics">Electronics</option>
                                                    <option value="Software">Software</option>
                                                    <option value="DBMS">DBMS</option>
                                                    <option value="CN">CN</option>
                                                </select>

                                            </div>
                                            
                                        <button class="ui button" type="submit" name ="add">Submit</button>
                                        </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br> <br>
    
    
<?php
    if (mysqli_num_rows($result2) > 0) {
        while ($row = mysqli_fetch_assoc($result2)) {
    ?>

    <br><br>
            <div class="col">
                <div class="card my-2">
                    <div class="card-">
                        <h6 class="card-header">Assigned to : <?php echo $row['assigned_to']; ?> </h6>
                        <p class="card-text">ID :<?php echo $row['judge_id']; ?></p>
                        <p class="card-text">Password : <?php echo $row['password']; ?></p>
                        <p class="card-text">Category :<?php echo $row['category']; ?></p>
                        <p class="card-text">
                        <form class="ui form" style="max-width: 700px; margin:0 auto;" action="add_judge.php" method ="post">
                        <input type="hidden" name="judge_id" id="judge_id" value = <?php echo $row['judge_id']; ?>>
                        <button class="ui button" type="submit" name ="delete">delete</button>
                        </form>
                        </p>
                    </div>
                </div>
            </div>
    <?php
        }
    }
    ?>
    <br><br>
    

    </div>
</div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>