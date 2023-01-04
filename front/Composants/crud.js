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

  $(".download-btn").on('click',()=>{
    $.ajax({
      url: "../../back/Composants/downloadAllComposants.php",
      type: "POST",
      cache: false,
      success: function(data){
        window.open('../../back/Composants/downloadAllComposants.php');
        }
  });
});

tippy('.download-btn', {
  content: 'Télécharger tous les composants avec leurs détails',
  delay:[100, 200],
  interactive: true,
  maxWidth: 350, 
});

});