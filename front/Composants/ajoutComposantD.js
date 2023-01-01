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
        $("#Form").trigger("reset");
    });
    var id = GetURLParameter("id");
    var img = $(".image img");
    //alert(id);

    //get nom et image du composant qu'on veut ajouter
    $.ajax({
        url: "../../back/Composants/getNomComposant.php",
        type: "GET",
        data: { id: id },
        success: function (res) {
          var data = res.split("$")
          $("#nom").val(data[0]);
          img.attr("src", `../../back/imagesComposants/${data[1]}`);
        },
      });

      //ajouter des pièces
      $("#Form").on("submit", (e) => {
        e.preventDefault();
          validateDate();
          $("#etat").val($("#select-etat").val());
          //alert($("#etat").val());
          $.ajax({
            type: "post",
            url: "../../back/Composants/ajoutComposantD.php?id="+id,
            data: $("#Form").serialize() ,
            success: function (res) {
              alert("Composant ajouté avec succès !");
              location.reload();
            },
          });
      });
    

      function validateDate() {
        let date = $("#date").val();
        // alert(date);
        if (date.length == "") {
        let currentDate = new Date().toJSON().slice(0, 10);
        $("#date").val(currentDate);
        } 
      }

});