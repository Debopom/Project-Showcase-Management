<?php
$project_id = $_GET['project_id'];

include_once 'dbconnect.php';


?>

<html>

<head>

</head>

<body>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <div class="container">
        <div class="col">
            <div class="card my-2">

                <h5 class="m-1">Put your markings here</h5>
                <hr>

                <form class="m-1" action="../api/marks_update.php" method="post">
                    <div class="form-group">
                        <label for="">Project Idea:</label>
                        <input class="form-control" type="int" name="idea">

                        <label for="">Features:</label>
                        <input class="form-control" type="int" name="features">

                        <label for="">Project Outlook:</label>
                        <input class="form-control" type="int" name="outlook">

                        <label for="">Implementation:</label>
                        <input class="form-control" type="int" name="implementation">

                        <label for="">Team Work:</label>
                        <input class="form-control" type="int" name="team_work">

                        <input type="hidden" name="project_id" value="<?php echo $project_id ?>" />
                        <br>
                        <input type="submit" value="Submit" name="b1" class="btn btn-primary" />

                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>