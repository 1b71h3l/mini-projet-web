<?php
include "../db.php";
$test = "";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Catamaran', sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table td,
        table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        table tr {
            background-color: white;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #ddd;
        }

        table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #6D90E1;
            color: white;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <th>id</th>
            <th>nom etud 1</th>
            <th>nom etud 2</th>
            <th>composant (qte)</th>
        </tr>

        <?php
        $sqlGroupe = "SELECT * FROM groupe ";
        $resultGroupe = $conn->query($sqlGroupe);
        if ($resultGroupe->num_rows > 0) {
            while ($rowGroupe = $resultGroupe->fetch_assoc()) {
                $test .= "<tr>
                <td>" . $rowGroupe['idGroupe'] . "</td>
                <td>" . $rowGroupe['nom_etud1'] . "</td>
                <td>" . $rowGroupe['nom_etud2'] . "</td>
                <td>";
                $sqlboite = "SELECT * FROM boite WHERE idGroupe=" . $rowGroupe['idGroupe'] . "";
                $resultboite = $conn->query($sqlboite);
                if ($resultboite->num_rows > 0) {
                    while ($rowboite = $resultboite->fetch_assoc()) {
                        $sqlComposant = "SELECT * FROM composant WHERE idComposant=" . $rowboite['idComposant'] . "";
                        $resultComposant = $conn->query($sqlComposant);
                        if ($resultComposant->num_rows > 0) {
                            while ($rowComposant = $resultComposant->fetch_assoc()) {
                                $test .= " " . $rowComposant['nom'] . " (" . $rowboite['qte'] . ")";

                            }
                        }
                    }
                }
                $test .= "</td> </tr>";
            }
        }
        echo $test;
        ?>

    </table>
</body>

</html>