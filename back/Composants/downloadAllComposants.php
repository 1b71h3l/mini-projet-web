<?php
include '../db.php';

$sql = "SELECT c.nom  , p.idPiece , p.dateAchat , p.etat FROM composant c , piece p where c.idcomposant=p.idcomposant  order by c.idComposant; "; 
$setRec = mysqli_query($conn, $sql); 
$columnHeader = '';  
$columnHeader = "Composant" . "\t" . "N de piece" . "\t" . "Date d'achat" . "\t". "Etat" . "\t";  

$setData = '';  
while ($rec = mysqli_fetch_row($setRec)) {  
    $rowData = '';  
    foreach ($rec as $value) {  
        $value = '"' . sanitize($value) . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}
    header("Content-Transfer-Encoding: UTF-8");
    $filename = "Composants_esi_sba".date('Ymd') . ".xls";     
    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=\"$filename\"");
    header("Pragma: no-cache");  
    header("Expires: 0"); 
    ob_clean();  // to prevent the first cellule from being empty
    echo ucwords($columnHeader) . "\n" . $setData . "\n"; 
    exit();

    function sanitize($line){
        $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $line); // attempt to translate similar characters
        $clean = preg_replace("/^'|[^A-Za-z0-9\s-]|'$/", '', $clean); // drop anything but ASCII
        return $clean;
     }
?>