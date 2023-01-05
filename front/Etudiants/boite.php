<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <link rel="stylesheet" href="./boite.css" />
  <title>Boite</title>
</head>

<body>
  <div id="blur">
    <nav class="navbar-container">
      <img src="../../images/logo.svg" alt="logo" />
      <ul>
        <li><a href="../home page/index.html">ACCUEIL</a></li>
        <li><a href="../Composants/board.html">COMPOSANTS</a></li>
        <li><a href="../Etudiants/list.html">ETUDIANTS</a></li>
      </ul>
    </nav>
    <div class="header">
      <h3>Composants dans la boite</h3>
      <div class="stroke">
        <p><a href="#">AJOUTER</a></p>
      </div>
    </div>
    <div class="comp-container" id="boite">
      <?php
      include "../../back/db.php";

      $id = $_GET['id'];
      // echo $id;
      $sql = "SELECT * FROM boite WHERE idGroupe=" . $id . "";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $sqlComposant = "SELECT * FROM composant WHERE idComposant=" . $row['idComposant'] . "";
          $resultComposant = $conn->query($sqlComposant);
          if ($resultComposant->num_rows > 0) {
            while ($rowComposant = $resultComposant->fetch_assoc()) {
              echo "<div class='comp'>
              <p>" . $rowComposant['nom'] . "</p>
              <input type='number' value=" . $row['qte'] . " disabled/>
          </div>";
            }
          }

        }
      }

      ?>
    </div>
    <div class="footer">
      <img src="../../images/esi-logo.png" alt="esi-logo" />
      <div>
        <h3>LOCALISATION</h3>
        <p>BP 73, Post Office EL WIAM Sidi Bel Abbés 22016, Algeria</p>
      </div>
      <div>
        <h3>CONTACT</h3>
        <p>+213-48-74-94-52</p>
        <p>contact@esi-sba.dz</p>
      </div>
      <div class="icons">
        <h3>RESEAUX</h3>
        <img src="../../images/linkedin.png" alt="linkedin" />
        <img src="../../images/facebook.png" alt="facebook" />
        <img src="../../images/youtube.png" alt="youtube" />
      </div>
    </div>
  </div>
  <div class="popup-container">
    <div class="up">
      <h1>Les informations du boite</h1>
      <a id="close" onclick="window.location.reload(true);">close</a>
    </div>
    <div class="comp-container">
      <form id="theForm" method="post">
        <?php

        $output = "";

        $sqlBoite = $conn->query("SELECT * FROM composant");
        if ($sqlBoite->num_rows > 0) {
          while ($row = $sqlBoite->fetch_assoc()) {
            $sqlqte = "SELECT count(*) FROM piece where idcomposant=" . $row['idComposant'] . "";
            $resultqte = $conn->query($sqlqte);
            while ($rowqte = $resultqte->fetch_assoc()) {
              if ($rowqte['count(*)'] > 0) {
                echo "
                <label>" . $row['nom'] . "</label>
                <input name='" . $row['idComposant'] . "' data-id='" . $id . "'type='number' min='0' max='" . $rowqte['count(*)'] . "'/>";
              }
            }
          }
        }
        ?>
        <button id="ajouter" type="submit">AJOUTER</button>
      </form>
    </div>
  </div>
  <script>
    $(document).ready(function () {
      $(document).on("click", ".stroke", function () {
        $(".popup-container").show();
        $("#blur").addClass("active");
      });
      $("#theForm").on("submit", function (e) {
        e.preventDefault();

        var names = {};
        $('input').each(function () {
          var id = $(this).attr('name');
          var qte = $(this).val();
          names[id] = qte;
        });
        // console.log(names);
        var id = $('input').data('id');
        $.ajax({
          type: "POST",
          url: "../../back/Etudiants/ajouterBoite.php",
          data: { id: id, names: JSON.stringify(names) },
          success: function (data) {
            alert("Boite ajoutee!");
            // console.log(data);
          }
        })
      });
    });
  </script>
</body>

</html>