<?php


session_start();
include 'dbconnect.php';



if (!isset($_SESSION['student_id'])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Project Showcase</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>

    <?php
    $data = $_GET['id'];
    include('student_navbar.php');
    ?>

    <div>
        <?php
        $query2 = "SELECT * FROM updates WHERE project_id = '$data'";
        $result2 = mysqli_query($conn, $query2);
        if (mysqli_num_rows($result2) > 0) {
            while ($row = mysqli_fetch_assoc($result2)) {
        ?>
                <div class="col">
                    <div class="card my-2">
                        <div class="card-">
                            <h6 class="card-header">Update number : <?php echo $row['update_no']; ?> </h6>
                            <p class="card-text">Description : <?php echo $row['description']; ?></p>
                            <p class="card-text">File Name : <?php echo $row['file']; ?></p>
                            
                        </div>
                    </div>
                </div>
            <?php
            }
        } else {
            ?>
            <div class="container h-100 d-flex">
                <p class="h4">You currently don't have any uploaded files.</p>
            </div>
        <?php
        }
        ?>
    </div>

    <hr>
    <div class="container h-100">
        <div class="d-flex  h-100">
            <div class="signup_card">

                <form action="project_update_upload.php" method="POST" enctype="multipart/form-data">

                    <div>
                        <p class="h2">Upload Your Updated Project Files Here</p>
                        <p>Please upload the files along with the <em>Slides</em> and <em>Reports</em>.</p>
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Upload ZIP file here</label>
                        <input class="form-control" type="file" id="formFile" name="file">
                        <input type="hidden" name="project_id" id="project_id" class="form-control  input_user" value=<?php echo $data ?> required>
                    </div>

                    <div>
                        <label for="project_timeframe">Category: </label>
                        <select class="custom-select custom-select-sm" name="project_timeframe">
                            <option value="proposal">Project Proposal</option>
                            <option value="mid">Mid Update</option>
                            <option value="pre_final">Pre-Final Update</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="file_description">Short Description</label>
                        <textarea class="form-control" id="file_description" name="file_description" rows="3"></textarea>
                    </div>

                    <button type="submit" name="button" class="btn btn">Submit</button>
                </form>

            </div>
        </div>
    </div>


</body>

</html>