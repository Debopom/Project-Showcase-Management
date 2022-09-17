<?php

session_start();
include 'dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $date = date('m/d/Y h:i:s a', time());
    $notice = $_POST['description'];
    $query2 = "INSERT INTO notice (date, notice) VALUES ('$date','$notice'); ";
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

    $query2 = "SELECT notice, course, date FROM notice ORDER BY sl desc";
    $result2 = mysqli_query($conn, $query2);?>
<div class="d-flex justify-content-center">

<div class="w-75 p-3 " style="background-color: #eee;" >
<button type="button" class="btncr btn-success btn-lg btn-block text-center" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                       Add Notice
                    </button>
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel"></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="ui form" style="max-width: 700px; margin:0 auto;" action="add_notice.php" method ="post">
                                        <h4 class="ui dividing header">Add a new Notice</h4>
                                        <div class="field">
                                        </div>
                                        <div class="field">
                                            <label>Description</label>
                                            <textarea rows = "5" cols = "50" name = "description">
                                                
                                            </textarea>
                                        </div>
                                            
                                        <button class="ui button" type="submit">Submit</button>
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
                        <h6 class="card-header">Date: <?php echo $row['date']; ?> </h6>
                        <p class="card-text"><?php echo $row['notice']; ?></p>
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