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
    session_start();

    include("dbconnect.php");

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        //something was posted
        $group_id = $_POST['group_id'];
        $student_id = $_POST['student_id'];
        $group_name = $_POST['group_name'];
        $group_category = $_POST['group_category'];

        $query2 = "SELECT * FROM groups WHERE group_id = '$group_id'";
        $result2 = mysqli_query($conn, $query2);
        $row = $result2 -> fetch_assoc();
        if($row>0){

            echo '<script>alert("group ID is taken.. Please try another id");</script>';
            die;
        }else{
            if (!empty($student_id) && !empty($group_name) && !empty($group_category)) {

                $student_ids = explode(',',$student_id);
                foreach($student_ids as $student_id){
                    $query = "insert into groups (group_id,student_id, group_name, group_category) values ('$group_id','$student_id', '$group_name', '$group_category')";
    
                    mysqli_query($conn, $query);
    
                }
                echo '<script>alert ("created successfully");</script>';
    
                header("Location: team_page.php");
                die;
            } else {
                echo '<script>alert("something went wrong please try again");</script>';
                header("Location: create_team.php");
            }
        }

        }

        
    ?>


    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="signup_card">

                <div class="d-flex justify-content-center form_container">
                    <form action="create_team.php" method="POST">

                        <div>
                            <p class="h2">Create your team.</p>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-append">

                            </div>
                            <input type="text" name="group_id" id="group_id" class="form-control  input_user" placeholder="Please enter a unique group ID" required>
                        </div>


                        <div class="input-group mb-3">
                            <div class="input-group-append">

                            </div>
                            <input type="text" name="student_id" id="student_id" class="form-control  input_user" placeholder="Member IDs" required>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-append">

                            </div>
                            <input type="text" name="group_name" id="group_name" class="form-control  input_user" placeholder="Group name" required>
                        </div>

                        <div class="input-group mb-2">
                            <div class="input-group-append">

                            </div>

                            <label for="group_category">Category: </label>

                            <select class="custom-select custom-select-sm" name="group_category">
                                <option value="Electronics">Electronics</option>
                                <option value="Software">Software</option>
                                <option value="DBMS">DBMS</option>
                                <option value="CN">CN</option>
                            </select>


                        </div>
                </div>
                <div class="d-flex justify-content-center mt-3 container">
                    <button onclick="myFunction()" type="submit" name="button" class="btn btn">Create</button>
                </div>
                </form>

            </div>
        </div>
    </div>

  

</body>

</html>