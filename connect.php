<?php
session_start();

$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$base_de_donnees = "autoworld_db";

$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

if ($connexion->connect_error) {
    die("La connexion a échoué : " . $connexion->connect_error);
}

// Login logic
if(isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $mot_de_passe = $_POST['password'];

    $sql = "SELECT utilisateur_id, email, pass_word, nom FROM users WHERE email = ?";
    // Using prepared statement to prevent SQL injection
    $stmt = $connexion->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultat = $stmt->get_result();

    if ($resultat->num_rows > 0) {
        $row = $resultat->fetch_assoc();
        $hashed_password = $row["pass_word"];

        if (password_verify($mot_de_passe, $hashed_password)) {
            // Store user information in session
            $_SESSION['user_id'] = $row["utilisateur_id"]; // Storing user ID
            $_SESSION['user_email'] = $email;
            $_SESSION['username'] = $row["nom"];
            // Redirect to homepage after successful login
            header("Location: AutoWorld.php?login=success");
            exit;
        } else {
            echo "Mot de passe incorrect!";
        }
    } else {
        echo "Email non trouvé!";
    }
}

$connexion->close();
