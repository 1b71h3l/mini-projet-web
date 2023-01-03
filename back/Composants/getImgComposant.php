<?php
//obtenir l'image du composant selectionné du drop-down list des composants
include "../db.php";
if (isset($_GET['id'])) {
    $sql = "SELECT * FROM composant where idComposant=".$_GET['id'];
    $result = $conn->query($sql);
    $output = "";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $output .= $row['image'] ;
        }
    } else {
        echo "0 results";
    }
    mysqli_close($conn);
    echo $output;
}
?>

