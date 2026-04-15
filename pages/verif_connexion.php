<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $mdp = $_POST["mdp"];

    // Connection a la BDD avec le fichier config.PHP
    require_once 'config/config.php'; 
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $mysqli->set_charset(DB_CHARSET);

    if ($mysqli->connect_error) {
        die("Erreur de connexion : " . $mysqli->connect_error);
    }

    // Prévention des injections SQL
    $stmt = $mysqli->prepare("SELECT * FROM Users WHERE Email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Vérification utilisateur
    if ($user = $result->fetch_assoc()) {
        if ($user["Mdp"] === $mdp) {
            $_SESSION["user"] = [
                "Nom" => $user["Nom"],
                "Email" => $user["Email"]
            ];
            header("Location: profil.php");
            exit();
        } else {
            echo "Mot de passe incorrect.";
        }
    } else {
        echo "Utilisateur non trouvé.";
    }

    $stmt->close();
    $mysqli->close();

    if (strlen($mdp) < 8) {
        die("Le mot de passe doit contenir au moins 8 caractères.");
    }
    
}
?>
