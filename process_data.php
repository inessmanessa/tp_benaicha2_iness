<?php
session_start();
if (isset($_SESSION['result-form'])) {
    
}
// Récupérer le nombre d'adresses depuis la session
$num_addresses = isset($_SESSION["num_addresses"]) ? $_SESSION["num_addresses"] : 0;

// Vérifier si le nombre d'adresses est valide
if ($num_addresses <= 0) {
    header("Location: index.php");
    exit();
}

// Collecter les adresses à partir des données POST et les stocker dans la session
$addresses = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $_SESSION['result-form']=$_POST;
    for ($i = 1; $i <= $num_addresses; $i++) {
        $addresses[] = array(
            'street' => $_POST['street_' . $i],
            'street_nb' => $_POST['street_nb_' . $i],
            'type' => $_POST['type_' . $i],
            'city' => $_POST['city_' . $i],
            'zipcode' => $_POST['zipcode_' . $i],
        );
    }

    // Stocker les adresses dans la session
    $_SESSION['addresses'] = $addresses;

    // Rediriger vers confirmation.php
    header("Location: confirmation.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Formulaire d'Adresse</title>
</head>

<body>
    <div class="container">
        <form action="second.php" method="post">
            <?php for ($i = 1; $i <= $num_addresses; $i++): ?>
            <h2>Adresse <?php echo $i; ?></h2>
            <label for="street_<?php echo $i; ?>">Street:</label>
            <input type="text" name="street_<?php echo $i; ?>" maxlength="50">

            <label for="street_nb_<?php echo $i; ?>">Street Number:</label>
            <input type="number" name="street_nb_<?php echo $i; ?>">

            <label for="type_<?php echo $i; ?>">Type:</label>
            <select name="type_<?php echo $i; ?>">
                <option value="livraison">Livraison</option>
                <option value="facturation">Facturation</option>
                <option value="autre">Autre</option>
            </select>

            <label for="city_<?php echo $i; ?>">City:</label>
            <select name="city_<?php echo $i; ?>">
                <option value="Montreal">Montreal</option>
                <option value="Laval">Laval</option>
                <option value="Toronto">Toronto</option>
                <option value="Quebec">Quebec</option>
            </select>

            <label for="zipcode_<?php echo $i; ?>">ZIP Code:</label>
            <input type="text" name="zipcode_<?php echo $i; ?>" maxlength="6">

            <?php endfor; ?>

            <input type="submit" value="Confirmer">
        </form>
    </div>
</body>

</html>