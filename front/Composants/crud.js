
$(document).ready(function(){
  $.ajax({
    url: "../../back/Composants/crudBroad.php",
    type: "POST",
    cache: false,
    success: function(data){
       // alert(data);
       console.log()
        $('.board-container').html(data); 
    }
});

    });

