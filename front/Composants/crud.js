$(document).ready(function(){
//importer les données et afficher les composants
  $.ajax({
    url: "../../back/Composants/crudBroad.php",
    type: "POST",
    cache: false,
    success: function(data){
        $('.board-container').html(data); 
    }
});

 //La recherche dans la page 
$("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".board-container .composant").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

});

