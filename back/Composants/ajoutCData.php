<?php 
//pour remplir le drp-down list des noms des composants dans la page ajoutComposant
include '../db.php';
$sql = "SELECT * FROM composant";
$result = $conn->query($sql);
$output = "<option value=''></option>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
            $output .= " <option value='".$row['idComposant']."' data='".$row['image']."'> ".$row['nom']."</option>";
        }
} else {
    echo "0 results";
}
mysqli_close($conn);
echo $output;
?>