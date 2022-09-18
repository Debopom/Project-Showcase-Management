//insert section code

$("button").click(function(){

    var name = $("#name").val();
    
    var email = $("#email").val();
    var phone = $("#phone").val();
    var role = $("#role").val();
    var dept = $("#dept").val();

   $.ajax({
       method: "POST",
       url:"organizer_insert.php",
       data:{name:name, email:email,phone:phone,role:role, dept:dept},
       success:function(data){
           // $("#reload").html(data)
           alert(data);
        //    read()
       }

   });


});


