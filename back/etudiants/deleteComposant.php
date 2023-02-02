<?php
include '../db.php';

$idComposant = $_POST['idComposant'];
$idGroupe = $_POST['idGroupe'];

$sql = "DELETE FROM boite WHERE idComposant = '$idComposant' AND idGroupe = '$idGroupe'";
$result = $conn->query($sql) or $conn->error;

if ($result) {
    echo "Le Composant est bien supprime!";
}
?>