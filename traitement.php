<?php

use LDAP\Result;

 require('create.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $caissier = $_POST['getNomCais'];
    $typecommande = $_POST['getTypeCmd'];
    $i = 0;
    $insert2 = "INSERT INTO Commande ( Type_Commande, Prenom)
    VALUES ('$typecommande', '$caissier')";

        if ( $conn->query($insert2) === TRUE) {
           echo "";
        }
        else {

        echo "nnne";

        }
    do {
        $p = $_POST['prod' . $i];
        $q = $_POST['Qte' . $i];
        $insert1 = "INSERT INTO Concerner (NomProduit, QuantiteProuduit)
    VALUES ('$p', '$q')";
        if ($conn->query($insert1) === TRUE) {
            echo "";
        } else
            echo "fausse";
        $i++;
        $p = $_POST['prod' . $i];
        $q = $_POST['Qte' . $i];
    } while ($p != null);
    include('index.php');
    
}
?>
