<?php 
//Ajouter des pièces pour un composant
include "../db.php";
    $idComposant = $_POST['nom'];
    $date = $_POST['date'];
    $qte =$_POST['qte'];
    $etat = $_POST['etat'];
    if (empty($etat)) {$etat = "disponible";}
    for ($i = 1; $i <= $qte; $i++) {
    $sql = "INSERT INTO piece(dateAchat,etat,idComposant) VALUES ('$date','$etat','$idComposant')";
    $result = $conn->query($sql);
    } 
    mysqli_close($conn);

// echo  $idComposant , $date , $qte ,$etat;
?>