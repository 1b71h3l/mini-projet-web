<?php
include '../db.php';

$id = $_POST['id'];

$sqlDelete = "DELETE FROM groupe WHERE idGroupe = '$id'";
$resultDelete = $conn->query($sqlDelete) or $conn->error;

if ($resultDelete) {
    echo "Le groupe est bien supprime!";
}
?>