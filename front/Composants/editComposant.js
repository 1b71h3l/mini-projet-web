//fonction pour extraire les donnees envoyées vis l'url
function GetURLParameter(sParam) {
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split("&");
    for (var i = 0; i < sURLVariables.length; i++) {
      var sParameterName = sURLVariables[i].split("=");
      if (sParameterName[0] == sParam) {
        return decodeURIComponent(sParameterName[1]);
      }
    }
  }

$(document).ready(function(){
    //réinitialiser
    $(".reset").click(function(){
        location.reload();
    });

    var idComposant = GetURLParameter("idC");
    var idPiece = GetURLParameter("idP");
    var img = $(".image img");

    // get nom et image du composant qu'on veut ajouter
    $.ajax({
        url: "../../back/Composants/getNomComposant.php",
        type: "GET",
        data: { id: idComposant },
        success: function (res) {
          var data = res.split("$")
          $("#nom").val(data[0]);
          img.attr("src", `../../back/imagesComposants/${data[1]}`);
        },
      });

      $.ajax({
        url: "../../back/Composants/getDataPiece.php",
        type: "GET",
        data: { id: idPiece },
        success: function (res) {
          var data = res.split("$")
          $("#date").val(data[0]);
          $("#select-etat").val(data[1]);
        },
      });

      //ajouter des pièces
      $("#Form").on("submit", (e) => {
        e.preventDefault();
          $("#etat").val($("#select-etat").val());
          //alert($("#etat").val());
          $.ajax({
            type: "post",
            url: "../../back/Composants/editComposant.php?id="+idPiece,
            data: $("#Form").serialize() ,
            success: function (res) {
              alert("Composant modifié avec succès !");
              location.reload();
            },
          });
      });
});