<!-- inscription.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="../assets/css/style.css">

</head>
<body>
    <h2>Créer un compte Binnected</h2>
    <div class="form-container">
        <form action="enregistrer.php" method="POST">
        <label>Nom :</label>
        <input type="text" name="nom" required><br>

        <label>Email :</label>
        <input type="email" name="email" required><br>

        <label>Mot de passe :</label>
        <input type="password" name="mdp" minlength="8" required
       oninvalid="this.setCustomValidity('Le mot de passe doit contenir au moins 8 caractères.')"
       oninput="this.setCustomValidity('')">

        <button type="submit">S'inscrire</button>
    </form>

</body>
</html>
