
//fonction pour extraire les donnees envoyées vis l'url
function GetURLParameter(sParam)
    {
        var sPageURL = window.location.search.substring(1);
        var sURLVariables = sPageURL.split('&');
        for (var i = 0; i < sURLVariables.length; i++)
        {
            var sParameterName = sURLVariables[i].split('=');
            if (sParameterName[0] == sParam)
            {
                return decodeURIComponent(sParameterName[1]);
            }
        }
    }

$(document).ready(function(){
//identifier le composant et afficher le header (nom , qte , image)
    var id = GetURLParameter('id');
    $.ajax({
      url: "../../back/Composants/showPiecesHeader.php?id="+id,
      type: "POST",
      cache: false,
      success: function(data){
        //  alert(data);
         $('.table-header').html(data); 
          //$('#table-composants').html(data); 
      }
  });
//importer les données et afficher les pieces
  $.ajax({
    url: "../../back/Composants/showPieces.php?id="+id,
    type: "POST",
    cache: false,
    success: function(data){
       //alert(data);
    $('#table-composants').html(data); 
    }
});
//chager l'url du boutton d'ajout vers la page d'ajout du composant déja identifié(Défini)
$('.ajout-btn').attr('href', './ajoutComposantD.html?id='+id);

});
