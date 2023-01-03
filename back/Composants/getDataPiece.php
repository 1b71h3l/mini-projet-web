<?php
//obtenir la date et l'etat de la pièce à modifier 
include "../db.php";
if (isset($_GET['id'])) {
    $sql = "SELECT * FROM piece where idPiece=".$_GET['id'];
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $output = $row['dateAchat']."$".$row['etat'];
        }
    } else {
        echo "0 results";
    }
    mysqli_close($conn);
    echo $output;
}
?>