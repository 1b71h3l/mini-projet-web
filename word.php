<?php

require "autoload.php";
include "./back/db.php";

$phpWord = new \PhpOffice\PhpWord\PhpWord();
$section = $phpWord->addSection();
$table = $section->addTable();

$sqlGroupe = "SELECT * FROM groupe ";
$resultGroupe = $conn->query($sqlGroupe);
if ($resultGroupe->num_rows > 0) {
    while ($rowGroupe = $resultGroupe->fetch_assoc()) {
        $table->addRow();
        $table->addCell(1750)->addText("" . $rowGroupe['idGroupe'] . "");
        $table->addCell(1750)->addText("" . $rowGroupe['nom_etud1'] . "");
        $table->addCell(1750)->addText("" . $rowGroupe['nom_etud2'] . "");
        $sqlboite = "SELECT * FROM boite WHERE idGroupe=" . $rowGroupe['idGroupe'] . "";
        $resultboite = $conn->query($sqlboite);
        if ($resultboite->num_rows > 0) {
            while ($rowboite = $resultboite->fetch_assoc()) {
                $sqlComposant = "SELECT * FROM composant WHERE idComposant=" . $rowboite['idComposant'] . "";
                $resultComposant = $conn->query($sqlComposant);
                if ($resultComposant->num_rows > 0) {
                    while ($rowComposant = $resultComposant->fetch_assoc()) {
                        $table->addCell(1750)->addText(" " . $rowComposant['nom'] . " (" . $rowboite['qte'] . ")");

                    }
                }
            }
        }
    }
}




// \PhpOffice\PhpWord\Shared\Html::addHtml($section, $html, false, false);

$file = "decharge.docx";
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=" . $file . "");
header("Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document");
header("Content-Transfer-Encoding: binary");
header("Cache-Control:must-revalidate, post-check-0, pre-check-0");
header("Expires: 0");

$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('php://output');

?>