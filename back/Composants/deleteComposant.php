<?php
//delete une pièce en passant son id
include '../db.php';
if (isset($_GET['id'])) {
    $sql = "DELETE FROM piece WHERE idPiece=" . $_GET["id"];
    if (mysqli_query($conn, $sql)) {
        echo "Pièce supprimée avec succès";
    } else {
        echo "Erreur lors de la suppression : " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>