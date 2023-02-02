<?php
include '../db.php';

$idGroupe = $_POST['id'];
$names = $_POST['names'];
$array = json_decode($names, true);

// print_r($array);
$count = count($array);

foreach ($array as $idComposant => $qte) {
    if (--$count <= 0) {
        break;
    }
    // echo $idComposant, $qte;
    $sqlSearch = "SELECT * FROM boite WHERE idGroupe='$idGroupe' AND idComposant= '$idComposant'";
    $resultSearch = $conn->query($sqlSearch);
    if ($row = $resultSearch->fetch_assoc() > 0) {
        if (!empty($qte)) {
            $sql = "UPDATE boite SET qte='$qte' WHERE idGroupe='$idGroupe' AND idComposant='$idComposant'";
            $result = $conn->query($sql);
        }
    } else {
        if (!empty($qte)) {
            $sqlInsert = "INSERT INTO boite (idGroupe, idComposant, qte) VALUES ('$idGroupe', '$idComposant', '$qte')";
            $resultInsert = $conn->query($sqlInsert);
        }
    }
}

?>