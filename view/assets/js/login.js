$("#login").submit(function(e){
  e.preventDefault();
  if ($(this).parsley().isValid()) {
    var nom= $("#name").val();
    var pass= $("#pass").val();
    $.post("ingreso",{name:name,pass:pass},function(data){
      var data = JSON.parse(data);

      if(data[0] == true){
        localStorage.setItem("LocalStorage","fulano");
          document.location.href="completeProfile";
      }else{
        alert(data[1]);
      }
    })
  }
})
