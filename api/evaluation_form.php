
<?php
$project_id = $_GET['project_id'];
echo $project_id;
include_once 'dbconnect.php';


?>

<html>
<head>

</head>

<body>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<div class="card" style="width: 300px;">
    <div class="card-body">

        <form action = "../api/marks_update.php" method= "post">
        Project Idea : <input type="int" name="idea"/>
        </br>
        Features : <input type="int" name="features"/>
        </br>
        Project Outlook : <input type="int" name="outlook"/>
        <br/>
        Implementation : <input type="int" name="implementation"/>
        <br/>
        Team work : <input type="int" name="team_work"/>
        <br/>
        <input type="hidden" name="project_id" value = "<?php echo $project_id?>"/>


        <input type="submit" value="Sum" name="b1"/>
        
    </div>
</div>

</form>
</body>

</html>