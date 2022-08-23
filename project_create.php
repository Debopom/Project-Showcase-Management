<html>
	<head><title>Project Creation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">

	</head>
	<body><br></br>

<form class="ui form" style="max-width: 700px; margin:0 auto;" action=project_result.php>
<h4 class="ui dividing header">Create Project</h4>


<div class="field">
   
    <input type=hidden name="PROJECT_ID" placeholder="Project ID">
  </div>

  <div class="field">
    <label>Project Title</label>
    <input type=text name="PROJECT_TITLE" placeholder="Project Title">
  </div>
	
  <div class="field">
    <label>Group ID</label>
    <input type=text name="GROUP_ID" placeholder="Integer No">
  </div>


<!-- <div class="field">
    <label>Marks</label>
    <input type=hidden name="MARKS" placeholder=" ">
  </div>

  <div class="field">
    <label>Room No</label>
    <input type=hidden name="ROOM_NO" placeholder="">
  </div> -->
<!-- 	
  <div class="field">
    <label>Project description</label>
    <input type=text name="PROJECT_DESCRIPTION" placeholder="144">
  </div> -->


  <div class="field">
    <label>category </label>
    <input type=text name="CATEGORY" placeholder="SAAD SECTION D">
  </div>
<!-- 	
  <div class="field">
    <label>Faculty ID</label>
    <input type=hidden name="FACULTY_ID" placeholder="144">
  </div>
	  -->

	
	<button class="ui button" type="submit">Submit</button>
</form>
</body>
</html>

<!-- PROJECT_ID
PROJECT_TITLE
GROUP_ID
MARKS
ROOM_NO
PROJECT_DESCRIPTION
CATEGORY
FACULTY_ID -->
