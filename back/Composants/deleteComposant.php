<?php
include '../db.php';
if (isset($_GET['id'])) {
    $sql = "DELETE FROM piece WHERE idPiece=" . $_GET["id"];
    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>