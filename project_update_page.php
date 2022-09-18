<?php


session_start();
include 'dbconnect.php';



if (!isset($_SESSION['student_id'])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Update</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>

    <?php
    include('student_navbar.php');
    ?>

    <div class="container">
        <br><br><br><br><br>
        <div class="col">
            <div class="card my-2">
                <h5 class="card-header">Your Projects</h5>

                <?php

                $query2 = ("SELECT *  FROM projects WHERE group_id IN (SELECT group_id from groups WHERE student_id ='$_SESSION[student_id]')");
                $result2 = mysqli_query($conn, $query2);

                if (mysqli_num_rows($result2) > 0) {
                    while ($row = mysqli_fetch_assoc($result2)) {
                ?>
                        <div class="card m-2">
                            <div class="card-">
                                <h4 class="card-header">Title: <?php echo $row['project_title']; ?> </h4>
                                <a href='project_update.php?id=<?php echo $row['project_id'] ?>' class="btn btn-primary m-1">File Upload</a>
                            </div>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <div class=>
                        <div>
                            <p>You don't have any project yet.</p>
                        </div>
                    </div>
            </div>
        <?php } ?>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>