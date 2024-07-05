<?php
// Connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$base_de_donnees = "autoworld_db";

$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

// Vérification de la connexion
if ($connexion->connect_error) {
    die("La connexion a échoué : " . $connexion->connect_error);
}

// Vérification si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérification si un e-mail est soumis
    if (isset($_POST['email'])) {
        // Nettoyage de l'e-mail soumis
        $email = htmlspecialchars($_POST['email']);

        // Préparation de la requête SQL pour insérer l'e-mail
        $sql = "INSERT INTO newsletters (email) VALUES (?)";
        $stmt = $connexion->prepare($sql);

        // Liaison des paramètres
        $stmt->bind_param("s", $email);

        // Exécution de la requête
        if ($stmt->execute()) {
            echo "Merci de vous être inscrit à notre newsletter!";
        } else {
            echo "Erreur lors de l'inscription à la newsletter : " . $connexion->error;
        }
    }
}

// Fermeture de la connexion
$connexion->close();
