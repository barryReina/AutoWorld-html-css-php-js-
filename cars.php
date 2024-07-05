<?php
session_start();

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    header("Location: AutoWorld.php"); // Redirection vers la page principale
    exit();
}

// Connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$base_de_donnees = "autoworld_db";

$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

if ($connexion->connect_error) {
    die("La connexion a échoué : " . $connexion->connect_error);
}

// Récupère les voitures achetées par l'utilisateur
$user_id = $_SESSION['user_id'];
$sql_cars = "SELECT * FROM achats WHERE utilisateur_id = ?";
$stmt_cars = $connexion->prepare($sql_cars);
$stmt_cars->bind_param("i", $user_id);
$stmt_cars->execute();
$result_cars = $stmt_cars->get_result();

// Récupère les pièces détachées achetées par l'utilisateur
$sql_pieces = "SELECT * FROM achats_pieces WHERE utilisateur_id = ?";
$stmt_pieces = $connexion->prepare($sql_pieces);
$stmt_pieces->bind_param("i", $user_id);
$stmt_pieces->execute();
$result_pieces = $stmt_pieces->get_result();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vos achats</title>
    <style>
        /* Styles CSS */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3f3f3;
        }
        h1, h2 {
            text-align: center;
            margin-top: 20px;
        }
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            grid-gap: 20px;
            padding: 20px;
        }
        .item {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Vos achats</h1>

    <h2>Voitures achetées</h2>
    <div class="grid-container">
        <?php while ($row_car = $result_cars->fetch_assoc()) : ?>
            <div class="item">
                <img src="images/<?= $row_car['modele'] ?>.png" alt="<?= $row_car['modele'] ?>">
                <h3><?= $row_car['modele'] ?></h3>
                <p><?= $row_car['prix'] ?>DT</p>
            </div>
        <?php endwhile; ?>
    </div>

    <h2>Pièces détachées achetées</h2>
    <div class="grid-container">
        <?php while ($row_piece = $result_pieces->fetch_assoc()) : ?>
            <div class="item">
                <img src="images/<?= $row_piece['nom_piece'] ?>.png" alt="<?= $row_piece['nom_piece'] ?>">
                <h3><?= $row_piece['nom_piece'] ?></h3>
                <p><?= $row_piece['prix'] ?>DT</p>
            </div>
        <?php endwhile; ?>
    </div>

    <script>
        // Redirection vers AutoWorld.php après 5 secondes
        setTimeout(function() {
            window.location.href = "AutoWorld.php";
        }, 10000);
    </script>
</body>
</html>

<?php
// Fermer la connexion
$connexion->close();
?>
