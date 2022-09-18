<?php

require 'dbcon.php'
?>

<?php

if (isset($_POST['username'])) {

  $uname = $_POST['username'];
  $password = $_POST['password'];
  // $query = "SELECT * from judge where judge_id = '$judge_id' limit 1";

  $sql = "SELECT * from oganizers  where id=$uname AND Password='$password' limit 1";

  $result = mysqli_query($con, $sql);

  if (mysqli_num_rows($result) == 1) {
    header("Location: dashboard.php");
    exit();
  } else {
    echo " You Have Entered Incorrect Password";
    exit();
  }
}

?>












<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Design by foolishdeveloper.com -->
  <title>Organizer Login</title>

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="index.css">

  <!--Stylesheet-->

</head>

<body>
  <div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
  </div>
  <form method="POST">
    <h3>Login Here</h3>

    <label for="username">ID</label>
    <input type="text" placeholder="ID provided by admin" id="username" name="username">

    <label for="password">Password</label>
    <input type="password" placeholder="Password" id="password" name="password">

    <button>Log In</button>
  </form>
</body>

</html>