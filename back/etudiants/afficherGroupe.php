<?php 
include '../db.php';

$sql = "SELECT * FROM groupe";
$result = $conn->query($sql);
$output = "";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $output .= "
        <div class='card' id='" . $row['idGroupe'] . "'>
        <div>
          <h3>" . $row['annee_etud1'] . "</h3>          
          <a href='boite.html'><img src='../../images/boite.png' alt='voirBoite' id='boite' /></a>
        </div>
        <div>
          <p>" . $row['nom_etud1'] . " & " . $row['nom_etud2'] . "</p>
          <a id='update' data-role='update' data-id=" . $row['idGroupe'] . "><img src='../../images/arrow.png' alt='afficherDetails' id='arrow' /></a>
        </div>
        </div>
      ";
    }
}

mysqli_close($conn);
echo $output;
?>

