
<?php
$group_id = $_GET['group_id'];
echo $project_id;
include_once 'dbconnect.php';


?>

<html>
<head>

</head>

<body>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>

<h4>Group members:</h4>
            <?php
            $sql2 = "SELECT * FROM  groups AS g JOIN student AS s ON (g.student_id=s.student_id)  WHERE group_id = $group_id";
            $rs2 = $conn-> query($sql2); 
            while($rows1=mysqli_fetch_array($rs2)) 
                                { 
                                    ?>
                                     <?php echo $rows1['student_id']; ?> <?php echo $rows1['name']; ?> <br>


                                <?php
                                }?>


<input type="submit" value="Sum" name="b1"/>

</form>
</body>

</html>