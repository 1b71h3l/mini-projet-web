<?php
//Remplir les informations des pièces d'un composants
include '../db.php';
$id = htmlspecialchars($_GET["id"]);
$sql = "SELECT *  FROM piece where idcomposant=".$id." order by idPiece";
$result = $conn->query($sql);
$output = "";
$etat ="";
$color="";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $etat = $row['etat'];
        if ($etat =='disponible') {
            $etat="Disponible";
            $color = "#10c638";
        } elseif ($etat =='enpanne') {
               $etat="En panne";
            $color = "#ee9d06";
        } else {
            $etat="Perdu";
            $color = "#c61010bb";
        } 
        $output .= " 
        <tr>
        <td>".$row['idPiece']."</td>
        <td>".$row['dateAchat']."</td>
        <td style='color:".$color.";''>".$etat."</td>
        <td>
        <a href='./editComposant.html?idP=".$row['idPiece']."&idC=".$row['idComposant']."' type='button' id='btnUpdate' class='action-btn'><i
                    class='fa-regular fa-pen-to-square'></i></a>
        <button data-id='".$row['idPiece']."' type='button' id='btnDelete' class='delete action-btn'><i
                    class='fa-solid fa-trash'></i></button>
        </td>
    </tr>";
            }
} else {
    $output .= "<h2 id='label'>0 results trouvés</h2>";
}
mysqli_close($conn);
echo $output;
?>