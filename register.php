<?php
// Vérifie si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $mot_de_passe = $_POST['password'];
    $confirmation_mot_de_passe = $_POST['confirm-password'];
    $date_de_naissance = $_POST['birthdate'];
    $sexe = isset($_POST['gender']) ? $_POST['gender'] : ''; // Vérifie si le sexe est défini

    // Validation côté serveur
   if (empty($nom) || empty($prenom) || empty($email) || empty($telephone) || empty($mot_de_passe) || empty($confirmation_mot_de_passe) || empty($date_de_naissance) || empty($sexe)) {
        echo "Tous les champs doivent être remplis.";
        exit(); 
    }

    // Valider le format de l'email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Adresse email invalide.";
        exit();
    }

    // Valider la longueur du mot de passe
    if (strlen($mot_de_passe) < 6) {
        echo "Le mot de passe doit contenir au moins 6 caractères.";
        exit();
    }

    // Valider que les mots de passe correspondent
    if ($mot_de_passe !== $confirmation_mot_de_passe) {
        echo "Les mots de passe ne correspondent pas.";
        exit();
    }

    try {
        // Connexion à la base de données
        $db = new PDO('mysql:host=localhost;dbname=autoworld_db;charset=utf8', 'root', '');

        // Hasher le mot de passe
        $mot_de_passe_hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);

        // Construction de la requête SQL avec les valeurs directement incluses
        $sql = "INSERT INTO users (nom, prenom, email, telephone, pass_word, birthdate, gender) 
                VALUES ('$nom', '$prenom', '$email', '$telephone', '$mot_de_passe_hash', '$date_de_naissance', '$sexe')";

        // Exécution de la requête SQL
        $db->exec($sql);

        echo "Nouveau compte créé avec succès";
        
    } catch (PDOException $e) {
        // En cas d'erreur
        echo 'Erreur : ' . $e->getMessage();
    }
}



