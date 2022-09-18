<?php


session_start();
include 'dbconnect.php';



if (!isset($_SESSION['faculty_id'])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Feculty-dashboard</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>

    <?php
    include('faculty_navbar.php');

    $query5 = ("SELECT * FROM faculty WHERE faculty_id	 ='$_SESSION[faculty_id]'");
    $result5 = mysqli_query($conn, $query5);
    $user_data5 = mysqli_fetch_assoc($result5);
    $query1 = ("SELECT * FROM projects WHERE faculty_id	 ='$_SESSION[faculty_id]'");
    $result1 = mysqli_query($conn, $query1);
    $user_data1 = mysqli_fetch_assoc($result1);

    ?>

    <div class="container">
        <div class="col"><?php echo "<h1>Hello " . $user_data5['faculty_name'] . "</h1>"; ?></div>
        <div class="col">
            <div class="card my-2">
                <h5 class="card-header">Projects</h5>
                <div class="card-body">
                    <h6 class="card-title">Title: <?php echo $user_data1['project_title']; ?> </h6>
                    <hr>
                    <p class="card-text"><?php echo $user_data1['description']; ?></p>
                </div>
            </div>
        </div>
    </div>

    <?php
    $query2 = "SELECT notice, course, date FROM notice ORDER BY sl desc limit 1";
    $result2 = mysqli_query($conn, $query2);
    $user_data2 = mysqli_fetch_assoc($result2);


    ?>

    <div class="container">
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







        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>