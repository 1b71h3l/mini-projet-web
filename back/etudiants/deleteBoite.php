<?php
include '../db.php';

$idGroupe = $_POST['idGroupe'];

$sql = "DELETE FROM boite WHERE idGroupe = '$idGroupe'";
$result = $conn->query($sql) or $conn->error;

if ($result) {
    echo "La boite est bien supprime!";
}
?>