<?php
include '../db.php';

$id = $_POST['id'];
$sql = "SELECT * FROM groupe where idGroupe=" . $id . "";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='up'>
            <h1>Les informations du groupe</h1>
            <a id='close' onclick='window.location.reload(true);'>close</a>
            </div>
            <h3>Le premier etudiant</h3>
            <div class='etud'>
            <p>Nom</p>
            <input type='text' value='" . $row['nom_etud1'] . "' id='nom1' />
            <p>Prenom</p>
            <input type='text' value='" . $row['prenom_etud1'] . "' id='prenom1' />";
        $selection = array('1CP', '2CP', '1CS', '2CS', '3CS');
        echo "<select id='annee1' >";
        foreach ($selection as $selection) {
            $selected = ($row['annee_etud1'] == $selection) ? "selected" : "";
            echo '<option ' . $selected . ' value="' . $selection . '">' . $selection . '</option>';
        }
        echo '</select> </div>';

        echo "<h3>Le Deuxieme etudiant</h3>
        <div class='etud'>
        <p>Nom</p>
        <input type='text' value='" . $row['nom_etud2'] . "' id='nom2'/>
        <p>Prenom</p>
        <input type='text' value='" . $row['prenom_etud2'] . "' id='prenom2' />";
        echo "<select id='annee2' >";
        $selection = array('1CP', '2CP', '1CS', '2CS', '3CS');
        foreach ($selection as $selection) {
            $selected = ($row['annee_etud2'] == $selection) ? "selected" : "";
            echo '<option ' . $selected . ' value="' . $selection . '">' . $selection . '</option>';
        }
        echo '</select> </div>';
        echo "
        <div class='btns'>
        <button id='supprimer'>SUPPRIMER</button>
        <button id='modifier'>MODIFIER</button>
        </div>";
    }
}
?>