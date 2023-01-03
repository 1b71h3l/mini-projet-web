<?php
include '../db.php';

$response = array(
    'status' => 0,
    'message' => 'Form submission Failed'
);

if(isset($_POST['nom1']) || isset($_POST['prenom1']) || isset($_POST['annee1']) || isset($_POST['nom2']) || isset($_POST['prenom2']) || isset($_POST['annee2'])){
    //get the submitted form data
    $nom1=$_POST['nom1'];
    $prenom1=$_POST['prenom1'];
    $annee1=$_POST['annee1'];
    $nom2=$_POST['nom2'];
    $prenom2=$_POST['prenom2'];
    $annee2=$_POST['annee2'];

    if(!empty($nom1) && !empty($prenom1) && !empty($annee1) && !empty($nom2) && !empty($prenom2) && !empty($annee2)){
        $sql = "INSERT INTO groupe (nom_etud1, prenom_etud1, annee_etud1, nom_etud2, prenom_etud2, annee_etud2) VALUES ('$nom1', '$prenom1', '$annee1', '$nom2', '$prenom2', '$annee2')";
        $result = $conn->query($sql);
        if ($result === TRUE) {
            $response['message'] = "groupe ajouter avec success !";
            $response['status'] = 1;
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
    } else {
        $response['message'] = "remplir tout les champs !";  
    }
}

echo json_encode($response);


mysqli_close($conn);
?>