<?php
session_start();

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    echo "Vous devez être connecté pour acheter une voiture.";
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

// Vérifie si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les données du formulaire et nettoie les entrées
    $modele = htmlspecialchars($_POST['modele']);
    $prix = $_POST['prix'];

    // Récupère l'identifiant de l'utilisateur depuis la session
    $utilisateur_id = $_SESSION['user_id'];

    try {
        // Préparation de la requête SQL avec des paramètres
        $sql = "INSERT INTO achats (modele, prix, date_achat, utilisateur_id) 
                VALUES (?, ?, CURDATE(), ?)";
        $stmt = $connexion->prepare($sql);

        // Liaison des paramètres
        $stmt->bind_param("sii", $modele, $prix, $utilisateur_id);

        // Exécution de la requête
        $stmt->execute();

        echo "Voiture achetée avec succès!";
        
    } catch (Exception $e) {
        // En cas d'erreur
        echo 'Erreur : ' . $e->getMessage();
    }
}

$connexion->close();

