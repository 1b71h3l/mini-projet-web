<?php
include '../db.php';

$idGroupe = $_POST['id'];
$names = $_POST['names'];
$array = json_decode($names, true);
// print_r($array);

foreach ($array as $idComposant => $qte) {
    echo "comp ", $idComposant, " qte ", $qte;
    if (!empty($qte)) {
        $sql = "INSERT INTO boite (idGroupe, idComposant, qte) VALUES ('$idGroupe', '$idComposant', '$qte')";
        $result = $conn->query($sql);
    }
}

?>