<?php
include '../db.php';

$id = $_POST['id'];
$nom1 = $_POST['nom1'];
$prenom1 = $_POST['prenom1'];
$annee1 = $_POST['annee1'];
$nom2 = $_POST['nom2'];
$prenom2 = $_POST['prenom2'];
$annee2 = $_POST['annee2'];

$sqlUpdate = "UPDATE groupe SET nom_etud1='$nom1', prenom_etud1='$prenom1', annee_etud1='$annee1', nom_etud2='$nom2', prenom_etud2='$prenom2', annee_etud2='$annee2'  WHERE idGroupe='$id'";
$resultUpdate = $conn->query($sqlUpdate);

if ($resultUpdate) {
    echo "les informations sont mis a jour!";
}
?>