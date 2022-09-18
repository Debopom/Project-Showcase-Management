<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Previous Project</title>
    <link rel="stylesheet" href="search_css.css">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <?php include('faculty_navbar.php');?>
 
<br><br>
<div class="container"> 

<h1>Search Previous Project</h1>

<div id="search_main"class="input-group">

<div id="search_card">  
     <div id="search-autocomplete" class="form-outline">
    <input type="search" id="live_search" class="form-control" placeholder="Student ID"/>
    <!-- <label class="form-label" for="live_search">Search</label> -->
  </div>
 </div>
 


  <button type="button" class="btn btn-primary">
    <i class="fas fa-search"></i>
  </button>
</div>

</div>

<div id="searchresult"></div> <br><br>


    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script src="search_ajax.js"></script>


    <script type="text/javascript">

    $(document).ready(function(){

        $("#live_search").keyup(function(){
            var input = $(this).val();
            // alert(input);

            if(input != ""){
                $.ajax({
                    url:"search_read.php",
                    method:"POST",
                    data:{input:input},

                    success:function(data){
                        $("#searchresult").html(data);
                    }
                });
            }else{
                $("#searchresult").css("display","none");
            }

        });

    });


</script>
</body>
</html>