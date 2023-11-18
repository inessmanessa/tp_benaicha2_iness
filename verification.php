<?php
session_start();
require_once "functions/functions.php";

// Récupérer les adresses de la session
$addresses = isset($_SESSION['addresses']) ? $_SESSION['addresses'] : array();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Confirmation des Adresses</title>
</head>

<body>
    <div class="container">
        <?php if (!empty($addresses)) : ?>
            <h2>Confirmation des Adresses</h2>

            <?php foreach ($addresses as $index => $address) : ?>
                <p><strong>Adresse <?= $index + 1; ?> :</strong></p>
                <p><strong>Rue:</strong> <?= $address['street']; ?></p>
                <p><strong>Numéro de Rue:</strong> <?= $address['street_nb']; ?></p>
                <p><strong>Type:</strong> <?= $address['type']; ?></p>
                <p><strong>Ville:</strong> <?= $address['city']; ?></p>
                <p><strong>Code Postal:</strong> <?= $address['zipcode']; ?></p>
                <hr>
            <?php endforeach; ?>

            <!-- Formulaire de confirmation et ajout à la base de données -->
            <form action="confirmation.php" method="post">
                <input type="submit" name="confirm" value="Confirmer">
            </form>

            <a href="second.php"><input type="button" name="backToForm" value="Retour vers l'arrière"></a>

            <?php
            // Vérifier si le formulaire de confirmation a été soumis
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm'])) :
                // Appeler la fonction pour ajouter les adresses à la base de données
                $success = addAddressesToDB($addresses);

                if ($success) :
                    echo "<p>Les adresses ont été ajoutées à la base de données avec succès.</p>";
                    // Vous pouvez également vider la session si nécessaire
                    unset($_SESSION['addresses']);
                else :
                    echo "<p>Une erreur s'est produite lors de l'ajout des adresses à la base de données.</p>";
                endif;
            endif;
            ?>
        <?php else : ?>
            <p>Aucune adresse à afficher.</p>
        <?php endif; ?>
    </div>
</body>

</html>