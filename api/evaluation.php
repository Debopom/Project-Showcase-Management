<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Details</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    session_start();

    include_once 'dbconnect.php';
    $project_id = $_POST['project_id'];

    $sql1 = "SELECT p.*,g.group_name,g.group_category FROM projects AS p JOIN groups AS g on (p.group_id=g.group_id) WHERE project_id = $project_id GROUP BY p.project_id";
    $rs1 = $conn->query($sql1);
    $result = $rs1->fetch_array();


    $sql = "SELECT * FROM updates WHERE project_id = $project_id";
    $rs = $conn->query($sql);


    ?>
    <div class="container">
        <div class="col">
            <div class="card my-2">
                <h2 class="card-header"><?php echo $result['project_title']; ?></h2>
                <div class="card-body">
                    <h4>Group Name : <?php echo $result['group_name']; ?></h4>
                    <hr>
                    <h5>Group members:</h5>
                    <?php
                    $sql2 = "SELECT * FROM projects AS p JOIN groups AS g on (p.group_id=g.group_id) JOIN student AS s ON (g.student_id=s.student_id)  WHERE project_id = $project_id";
                    $rs2 = $conn->query($sql2);
                    ?>
                    <ul class="list-group ">
                        <?php
                        while ($rows1 = mysqli_fetch_array($rs2)) {
                        ?>
                            <li class="list-group-item"><?php echo $rows1['student_id']; ?> <?php echo $rows1['name']; ?></li>
                    </ul>

                <?php
                        } ?>
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Update no </th>
                            <th scope="col">Description</th>
                            <th scope="col">Feedback </th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($rows = mysqli_fetch_array($rs)) { ?>
                            <tr>
                                <td><?php echo $rows['update_no']; ?></td>
                                <td><?php echo $rows['description']; ?></td>
                                <td><?php echo $rows['feedback']; ?></td>
                                <td><?php echo $rows['status']; ?></td>


                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <button class="btn btn-primary" onclick='getForm()'>Evaluation Form</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        function getForm() {
            let project_id = <?php echo $project_id ?>;


            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("form").innerHTML = this.responseText;

                }
            };
            xmlhttp.open("GET", "../api/evaluation_form.php?project_id=" + project_id, true);
            xmlhttp.send();



        }
    </script>
    <div id="form"></div>
</body>

</html>