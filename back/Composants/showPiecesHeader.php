<?php
include '../db.php';
$id = htmlspecialchars($_GET["id"]);
$sql = "SELECT * FROM composant where idcomposant=".$id.""; #. $row['image'] .
$result = $conn->query($sql);
$output = "";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sqlqte = "SELECT count(*) FROM piece where idcomposant=" .$id. "";
        $resultqte = $conn->query($sqlqte);
        while ($rowqte = $resultqte->fetch_assoc()) {
            if ($rowqte['count(*)'] > 0) {
                $output .= "<h2 id='label'>Composant: " . $row['nom'] . "&nbsp; &nbsp; Quantité : " . $rowqte['count(*)'] . "</h2>
                 <img src='../../back/imagesComposants/" . $row['image'] . "' alt='image-" . $row['nom'] . "'>  ";
            }
        }
    }
} else {
    $output .= "<h2 id='label'>0 results</h2>";
}
mysqli_close($conn);
echo $output;
?>