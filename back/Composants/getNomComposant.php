<?php
//obtenir le nom et l'image du composant à ajouter
include "../db.php";
if (isset($_GET['id'])) {
    $sql = "SELECT * FROM composant where idComposant=".$_GET['id'];
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $output = $row['nom']."$".$row['image'];
        }
    } else {
        echo "0 results";
    }
    mysqli_close($conn);
    echo $output;
}
?>