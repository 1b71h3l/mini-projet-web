<?php 
//Modifier l'etat d'une pièce
include "../db.php";
    $idPiece = htmlspecialchars($_GET["id"]);
    $etat = $_POST['etat'];
    if (empty($etat)) {$etat = "disponible";}
    $sql = "UPDATE piece SET etat= '$etat' WHERE idPiece = '$idPiece' ";
    $result = $conn->query($sql);
    mysqli_close($conn);
?>