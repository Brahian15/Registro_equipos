/***************************************************
 ** VALIDAMOS QUE EXISTA EL CORREO                **
 ***************************************************/

$("#txtpass").focus(function(){
  $("#txtemail").siblings("span").remove();
  var email = $("#txtemail").val();
  $.post("index.php?c=auth&a=validEmail",{email:email},function(data){
          var data = JSON.parse(data);
          $("#txtemail").siblings("label").after("<span class='error'>"+data[0]+"</span>");

          if(data[1] == false){
            $("#btnLogin").attr("disabled",true);
          }else{
            $("#btnLogin").attr("disabled",false);
          }
  });
})

$("#txtemail").focus(function(){
  $(this).siblings("span").remove();
})

/***************************************************
 ** INICIAMOS SESION SI EL USUARIO EXISTE         **
 ***************************************************/


$("#frmLogin").submit(function(e) {
        e.preventDefault();
        if ($(this).parsley().isValid()) {
            var email= $("#txtemail").val();
            var pass= $("#txtpass").val();

            $.post("acceso",{email:email, pass:pass},function(data){
                var data = JSON.parse(data);

                if(data[0] == true){
                  document.location.href="?c=admin&a=readUser";
                }else{
                  alert(data[1]);
                }
            })
        }
});
