<!-- connexion.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <h2>Connexion à Binnected</h2>
    <div class="form-container">
        <form action="verif_connexion.php" method="POST">
        <label for="email">Email :</label>
        <input type="email" name="email" required><br>

        <label for="mdp">Mot de passe :</label>
        <input type="password" name="mdp" required><br>

        <button type="submit">Se connecter</button>
    </form>
    <p>Pas encore inscrit ? <a href="inscription.php">Créer un compte</a></p>

</body>
</html>
