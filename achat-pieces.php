<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    echo "Vous devez être connecté pour acheter des pièces de rechange.";
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

// Traitement de l'achat lorsque le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si les données nécessaires sont reçues
    if (isset($_POST['nom_piece']) && isset($_POST['prix'])) {
        $utilisateur_id = $_SESSION['user_id'];
        $nom_piece = $_POST['nom_piece'];
        $prix = $_POST['prix'];
        $date_achat = date("Y-m-d");

        // Insérer l'achat dans la base de données
        $sql = "INSERT INTO achats_pieces (utilisateur_id, nom_piece, prix, date_achat) VALUES (?, ?, ?, ?)";
        $stmt = $connexion->prepare($sql);
        $stmt->bind_param("isds", $utilisateur_id, $nom_piece, $prix, $date_achat);
        
        if ($stmt->execute()) {
            echo "Pièce achetée avec succès!";
        } else {
            echo "Erreur lors de l'achat de la pièce : " . $connexion->error;
        }
    } else {
        echo "Des données nécessaires sont manquantes.";
    }
}

$connexion->close();
