<?php
//echo "<p>0 results</p> <hr/>";
include '../db.php';
$sql = "SELECT * FROM composant";
$result = $conn->query($sql);
$output = "";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sqlqte = "SELECT count(*) FROM piece where idcomposant=" . $row['idComposant'] . "";
        $resultqte = $conn->query($sqlqte);
        while ($rowqte = $resultqte->fetch_assoc()) {
            $output .= "<div class='composant'>
        <div class='composant-img'>
            <img src='../../back/imagesComposants/" . $row['image'] . "'></img>
        </div>
        <div class='composant-info'>
            <p class='name'>" . $row['nom'] . "</p>
            <p class='qte'>" . $rowqte['count(*)'] . "</p>
        </div>
        <hr/>
        <div class='composant-actions'>
            <a href='./showPieces.html' class='action-btn'><i class='fa-solid fa-arrow-up-right-from-square'></i></a>
        </div>
    </div>  ";
            //"<p>".$row['nom']."</p><p>".$row['image']."</p><p>".$row['idComposant']."</p>"	;
        }
    }
} else {
    echo "0 results";
}
mysqli_close($conn);
echo $output;
?>