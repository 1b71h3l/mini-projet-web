$(document).ready(function () {
  $(".reset").click(function () {
    //$("#Form").trigger("reset");
    location.reload();
  });

  $.ajax({
    url: "../../back/Composants/ajoutCData.php",
    type: "POST",
    cache: false,
    success: function (data) {
      $("#nom").html(data);
    },
  });

  //changer l'image dès que l'user choisi le nom
  $("#nom").on("input", function () {
    var id = $(this).val();
    var img = $(".image img");
    if (id > 0) {
      $.ajax({
        url: "../../back/Composants/getImgComposant.php",
        type: "GET",
        data: { id: id },
        error: function () {
          alert("Something is wrong");
        },
        success: function (data) {
          img.attr("src", `../../back/imagesComposants/${data}`);
          //alert(data);
        },
      });
    }
  });

  $("#Form").on("submit", (e) => {
    e.preventDefault();
    var val = validateName();
    //var date = $("#date").val();
    if (val) { 
      validateDate();
      $("#etat").val($("#select-etat").val());
      $.ajax({
        type: "post",
        url: "../../back/Composants/ajoutComposant.php",
        data: $("#Form").serialize(),
        success: function (res) {
          alert("Composant ajouté avec succès !");
          location.reload();
        },
      });
    }
  });


  function validateDate() {
    let date = $("#date").val();
    // alert(date);
    if (date.length == "") {
    let currentDate = new Date().toJSON().slice(0, 10);
    $("#date").val(currentDate);
    } 
  }

  function validateName() {
    let nom = $("#nom").val();
    //alert(nom);
    if (nom.length == "") {
      $("#nomcheck").show();
      return false;
    } else {
      $("#nomcheck").hide();
      return true;
    }
  }
});
