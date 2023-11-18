<?php

require_once("dbConnection.php");

function addAddressesToDB($addresses) {
    $conn = connectDB();

    $sql = "INSERT INTO address (street, street_nb, type, city, zipcode) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt === false) {
        die("Erreur de préparation de la requête: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "sisss", $street, $street_nb, $type, $city, $zipcode);

    foreach ($addresses as $address) {
        $street = $address['street'];
        $street_nb = $address['street_nb'];
        $type = $address['type'];
        $city = $address['city'];
        $zipcode = $address['zipcode'];

        // Exécution de la requête
        $result = mysqli_stmt_execute($stmt);

        // Vérification des erreurs
        if (!$result) {
            die("Erreur d'exécution de la requête: " . mysqli_error($conn));
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    return true;  
}
?>