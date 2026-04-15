<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $mdp = $_POST["mdp"];

    // Connection a la BDD avec le fichier config.PHP
    require_once __DIR__ . '/../config/config.php';
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $mysqli->set_charset(DB_CHARSET);

    if ($mysqli->connect_error) {
        die("Erreur de connexion : " . $mysqli->connect_error);
    }

    // Vérifie si l'email existe déjà
    $check = $mysqli->prepare("SELECT * FROM Users WHERE Email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $res = $check->get_result();

    if ($res->num_rows > 0) {
        echo "Cet email est déjà utilisé.";
    } else {
        $stmt = $mysqli->prepare("INSERT INTO Users (Nom, Email, Mdp) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nom, $email, $mdp);
        if ($stmt->execute()) {
            echo "Compte créé avec succès. <a href='connexion.php'>Connectez-vous</a>";
        } else {
            echo "Erreur lors de l'inscription.";
        }
        $stmt->close();
    }

    $check->close();
    $mysqli->close();

    if (strlen($_POST['mdp']) < 8) {
        die("Le mot de passe doit contenir au moins 8 caractères.");
    }
    
}
?>
