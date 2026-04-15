<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: connexion.php");
    exit();
}

$nom = $_SESSION["user"]["Nom"];
$email = $_SESSION["user"]["Email"];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="iconUser" href="../assets/img/iconUser.png">
    <title>Profil - Binnected</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>

    <header2>
        <div class="logo-title">
            <img src="../assets/img/logo.png" alt="Logo Binnected" class="logo">
            <img src="../assets/img/iconUser.png" alt="Logo User" class="logoUser">
            <h1>Binnected.</h1>
                <div class="Titre_User">
                    <h1>Bienvenue, <?= htmlspecialchars($nom) ?></h1>
                </div>

        </div>
        <nav>
            <a href="#VosDonnees">Vos données</a>
            <a href="#SeComparer">Se comparer</a>
            <a href="#Conseil">Conseil</a>
            <a href="#MonCompte">Mon compte</a>
        </nav>
    </header2>

    <!-- VOS DONNÉES -->
<section id="VosDonnees">
    <h2>Vos Données</h2>   
    <div class="content">
        <p>Voici la répartition de vos déchets triés :</p>
        <canvas id="donneesPieChart" width="300" height="300"></canvas>

        <div style="margin-top: 20px;">
            <p><strong>Résumé :</strong></p>
            <ul>
                <li>🟢 55% de déchets recyclables (verre, plastique, métal)</li>
                <li>🟡 25% de biodéchets</li>
                <li>🔴 20% de déchets non recyclables</li>
            </ul>
        </div>
    </div>
</section>


    
<section id="SeComparer">
    <h2>Se Comparer</h2>
    <div class="content">
        <canvas id="comparaisonChart" width="600" height="300"></canvas>
        <p style="margin-top: 20px;">Vous êtes au-dessus de la moyenne régionale ! Continuez comme ça 🎉</p>
    </div>
</section>

<script>
    const ctx = document.getElementById('comparaisonChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Vous', 'Région', 'France'],
            datasets: [{
                label: '% de déchets bien triés',
                data: [85, 72, 70],
                backgroundColor: ['#4caf50', '#81c784', '#c8e6c9'],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100
                }
            }
        }
    });
</script>


  <section id="Conseil">
    <h2>Conseil</h2>
    <div class="content">
        <ul style="list-style: none; padding: 0;">
            <li><strong>Recyclage :</strong> Pas besoin de rincez vos contenants avant de les jeter !</li>
            <li><strong>Compostage :</strong> Mettez vos déchets organiques dans un composteur.</li>
            <li><strong>Plastique :</strong> Réduisez votre usage des plastiques à usage unique.</li>
            <li><strong>Piles usagées :</strong> Déposez-les dans les bornes prévues en magasin.</li>
            <li><strong>Sacs :</strong> Utilisez des sacs réutilisables pour vos courses.</li>
        </ul>
    </div>
</section>

<section id="MonCompte">
    <h2>Mon Compte</h2>
    <div class="content">
        <form action="#" method="POST">
            <label for="nom">Nom :</label><br>
            <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($nom) ?>" disabled><br><br>

            <label for="email">Email :</label><br>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($email) ?>" disabled><br><br>

            <label for="mdp">Mot de passe :</label><br>
            <input type="password" id="mdp" name="mdp" placeholder="********" disabled><br><br>

            <button type="button" onclick="alert('Fonction à venir !')">Modifier mon profil</button>
        </form>
    </div>
</section>


<div style="text-align: center; margin-bottom: 50px;">
    <a href="deconnexion.php" style="color: #388e3c; font-weight: bold; text-decoration: none; font-size: 18px;">
        🔒 Se déconnecter
    </a>
</div>


<script>
    const pieCtx = document.getElementById('donneesPieChart').getContext('2d');
    new Chart(pieCtx, {
        type: 'pie',
        data: {
            labels: ['Recyclables', 'Biodéchets', 'Non recyclables'],
            datasets: [{
                label: 'Répartition',
                data: [55, 25, 20],
                backgroundColor: [
                    '#66bb6a', // vert
                    '#ffee58', // jaune
                    '#ef5350'  // rouge
                ],
                borderColor: '#ffffff',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
</script>

</body>
</html>
