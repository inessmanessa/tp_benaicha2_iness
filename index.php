<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Formulaire d'Adresses</title>
</head>
<body>
    <div class="container">
        <form action="process.php" method="post">
            <label for="addressCount">Combien d'adresses avez-vous ?</label>
            <input type="number" name="addressCount" required>
            <button type="submit">Continuer</button>
        </form>
    </div>
</body>
</html>
