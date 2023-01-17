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
        <li><a href="../homepage/index.html">ACCUEIL</a></li>
        <li><a href="../Composants/board.html">COMPOSANTS</a></li>
        <li><a href="../Etudiants/list.html">ETUDIANTS</a></li>
      </ul>
    </nav>
    <div class="header">
      <h3>Composants dans la boite</h3>
      <div class="btns">
        <div class="stroke" id="delete">
          <p><a href="#">SUPPRIMER</a></p>
        </div>
        <div class="stroke" id="update">
          <p><a href="#">MODIFIER</a></p>
        </div>
        <div class="stroke" id="add">
          <p><a href="#">AJOUTER</a></p>
        </div>
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
    <div>
      <?php echo "<span data-id='" . $id . "'></span>"; ?>
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
  <div class="popup-container" id="popup-add">
    <div class="up">
      <h1>Ajouter une boite</h1>
      <a id="close" onclick="window.location.reload(true);">close</a>
    </div>
    <div class="comp-container">
      <form id="theForm" class="form" method="post">
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
                <input class='bla' name='" . $row['idComposant'] . "' type='number' min='0' max='" . $rowqte['count(*)'] . "'/>";
              }
            }
          }
        }
        ?>
        <button id="ajouter" type="submit">AJOUTER</button>
      </form>
    </div>
  </div>
  <div class="popup-container" id="popup-update">
    <div class="up">
      <h1>Modifier les composants dans la boite</h1>
      <a id="close" onclick="window.location.reload(true);">close</a>
    </div>
    <div class="comp-container">
      <form id="updateForm" class="form" method="post">
        <?php

        $output = "";
        $sqlBoite = $conn->query("SELECT * FROM composant");
        if ($sqlBoite->num_rows > 0) {
          while ($row = $sqlBoite->fetch_assoc()) {
            $sqlqte = "SELECT count(*) FROM piece WHERE idcomposant=" . $row['idComposant'] . "";
            $resultqte = $conn->query($sqlqte);
            while ($rowqte = $resultqte->fetch_assoc()) {
              if ($rowqte['count(*)'] > 0) {
                $sqlboite = "SELECT * FROM boite WHERE idGroupe=" . $id . " AND idComposant=" . $row['idComposant'] . "";
                $resultboite = $conn->query($sqlboite);
                if ($resultboite->num_rows > 0) {
                  while ($rowboite = $resultboite->fetch_assoc()) {
                    echo "
                <label>" . $row['nom'] . "</label>
                <input name='" . $row['idComposant'] . "' type='number' min='0' max='" . $rowqte['count(*)'] . "' value='" . $rowboite['qte'] . "'/>";
                  }
                } else {
                  echo "
                  <label>" . $row['nom'] . "</label>
                  <input name='" . $row['idComposant'] . "' type='number' min='0' max='" . $rowqte['count(*)'] . "' value='0'/>";
                }
              }
            }
          }
        }
        ?>
        <button id="ajouter" type="submit">MODIFIER</button>
      </form>
    </div>
  </div>
  <div class="popup-container" id="popup-delete">
    <div class="up">
      <h1>Supprimer des composants dans la boite</h1>
      <a id="deleteAll" onclick="window.location.reload(true);">delete</a>
      <a id="close" onclick="window.location.reload(true);">close</a>
    </div>
    <div class="comp-container">
      <div class="form">
        <?php

        $output = "";
        $sqlBoite = $conn->query("SELECT * FROM composant");
        if ($sqlBoite->num_rows > 0) {
          while ($row = $sqlBoite->fetch_assoc()) {
            $sqlqte = "SELECT count(*) FROM piece WHERE idcomposant=" . $row['idComposant'] . "";
            $resultqte = $conn->query($sqlqte);
            while ($rowqte = $resultqte->fetch_assoc()) {
              if ($rowqte['count(*)'] > 0) {
                $sqlboite = "SELECT * FROM boite WHERE idGroupe=" . $id . " AND idComposant=" . $row['idComposant'] . "";
                $resultboite = $conn->query($sqlboite);
                if ($resultboite->num_rows > 0) {
                  while ($rowboite = $resultboite->fetch_assoc()) {
                    echo "
                <label>" . $row['nom'] . "</label>
                <a href='#' class='btn-delete' data-id=" . $row['idComposant'] . ">delete</a>";
                  }
                }
              }
            }
          }
        }
        ?>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function () {
      $(document).on("click", "#add", function () {
        $("#popup-add").show();
        $("#blur").addClass("active");
      });
      $("#theForm").on("submit", function (e) {
        e.preventDefault();

        var names = {};
        $('.bla').each(function () {
          var idComposant = $(this).attr('name');
          var qte = $(this).val();
          names[idComposant] = qte;
        });
        console.log(names);
        var id = $('span').data('id');
        $.ajax({
          type: "POST",
          url: "../../back/Etudiants/ajouterBoite.php",
          data: { id: id, names: JSON.stringify(names) },
          success: function (data) {
            alert("Boite ajoutee!");
            console.log(data);
          }
        })
      });
      $(document).on('click', '#update', function () {
        $("#popup-update").show();
        $("#blur").addClass("active");
      });
      $("#updateForm").on("submit", function (e) {
        e.preventDefault();

        var names = {};
        $('#popup-update input').each(function () {
          var idComposant = $(this).attr('name');
          var qte = $(this).val();
          names[idComposant] = qte;
        });
        console.log(names);
        var id = $('span').data('id');
        $.ajax({
          type: "POST",
          url: "../../back/Etudiants/updateBoite.php",
          data: { id: id, names: JSON.stringify(names) },
          success: function (data) {
            alert("Boite modifiee!");
            // console.log(data);
          }
        })
      });
      $(document).on('click', '#delete', function () {
        $("#popup-delete").show();
        $("#blur").addClass("active");
      });
      $(document).on('click', '.btn-delete', function () {
        var idComposant = $(this).data('id');
        var idGroupe = $('span').data('id');
        $.ajax({
          type: "POST",
          url: "../../back/Etudiants/deleteComposant.php",
          data: { idComposant: idComposant, idGroupe: idGroupe },
          success: function (data) {
            alert("Le Composant est bien supprime!");
            console.log(data);
          }
        })
      });
      $(document).on('click', '#deleteAll', function () {
        var idGroupe = $('span').data('id');
        $.ajax({
          type: "POST",
          url: "../../back/Etudiants/deleteBoite.php",
          data: { idGroupe: idGroupe },
          success: function (data) {
            alert("Boite supprimee!");
            console.log(data);
          }
        })
      });
    });
  </script>
</body>

</html>