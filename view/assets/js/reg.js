$("#emailreg").focusout(function(){
  $("#emailreg").siblings("span").remove();
    var email= $("#emailreg").val();
   $.post("index.php?c=auth&a=notFoundMail",{email:email},function(data){
         var data = JSON.parse(data);
          if(data[1] == false){
      $("#emailreg").siblings("label").after("<span class='error'>"+data[0]+"</span>");
            console.log(data);
            $("#btnReg").attr("disabled",true);
          }else{
      $("#emailreg").siblings("span").remove();
            $("#btnReg").attr("disabled",false);
          }
  });

});

