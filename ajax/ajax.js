//insert section code

$("button").click(function(){

    var name = $("#name").val();
    var s_id = $("#s_id").val();
    var email = $("#email").val();
    var dept = $("#dept").val();

   $.ajax({
       method: "POST",
       url:"insert.php",
       data:{name:name,s_id:s_id, email:email, dept:dept},
       success:function(data){
           // $("#reload").html(data)
           alert(data);
        //    read()
       }

   });


});


//read section code here

// function read(){
//    var read="";
//    $.ajax({
//        url:"read.php",
//        method:"POST",
//        data:{read:read},
//        success:function(data){
//            $("#tbody").html(data);
//        }
//    });

// }


