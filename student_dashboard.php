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
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>

    <?php
    include('student_navbar.php');

    $query1 = ("SELECT * from student WHERE student_id ='$_SESSION[student_id]'");
    $result1 = mysqli_query($conn, $query1);
    $user_data1 = mysqli_fetch_assoc($result1);

    $query2 = "SELECT notice, course, date FROM notice ORDER BY sl desc limit 1";
    $result2 = mysqli_query($conn, $query2);
    $user_data2 = mysqli_fetch_assoc($result2);


    ?>

    <div class="container">
        <div class="col"><?php echo "<h1>Hello " . $user_data1['name'] . "</h1>"; ?></div>
        <div class="col">

            <div class="card my-2">
                <h5 class="card-header">Notices</h5>
                <?php
                if ($user_data2 > 0) {
                ?>
                    <div class="card-body">
                        <h6 class="card-title">Date: <?php echo $user_data2['date']; ?> </h6>
                        <hr>
                        <p class="card-text"><?php echo $user_data2['notice']; ?></p>
                        <a href="student-notice-view.php" class="btn btn-primary">Show all</a>
                    </div>
            </div>
        <?php
                } else {
        ?>

            <div class="card m-1">
                <div class="m-1">
                    <p>There's no notice for you.</p>
                </div>
            </div>
        <?php } ?>

        <div class="card my-2">
            <h5 class="card-header">Groups</h5>

            <?php

            $query2 = "SELECT * FROM groups WHERE student_id = '$_SESSION[student_id]' ";
            $result2 = mysqli_query($conn, $query2);

            if (mysqli_num_rows($result2) > 0) {
                while ($row = mysqli_fetch_assoc($result2)) {
            ?>

                    <div class="card m-2">
                        <div class="m-1">
                            <h6>Name: <?php echo $row['group_name']; ?> </h6>
                            <p>ID:<?php echo $row['group_id']; ?> </p>
                            <p>Category: <?php echo $row['group_category']; ?></p>
                        </div>
                    </div>

                <?php
                }
            } else {
                ?>
                <div class=>
                    <div>
                        <p>You are not in any group yet</p>
                    </div>
                </div>
        </div>
    <?php } ?>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>