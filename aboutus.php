<!DOCTYPE html>
<html>

<head>
  <script>
    
    function togglePopup() {
        var popup = document.getElementById("popup");
        var profilInfo = document.getElementById("profil-info");
    
        <?php
        session_start();
        if(isset($_SESSION['user_email'])) {
        ?>
            // If user is logged in, show profile information
            profilInfo.style.display = "block";
        <?php
        } else {
        ?>
            // If user is not logged in, show the regular popup
            if (popup.style.display === "none" || popup.style.display === "") {
                popup.style.display = "block";
            } else {
                popup.style.display = "none";
            }
        <?php
        }
        ?>
    }
    function closeProfilePopup() {
        var profilInfoPopup = document.getElementById("profil-info");
        profilInfoPopup.style.display = "none";
    }
    
    
    function openLoginPopup() {
        var popup = document.getElementById("popup");
        var loginPopup = document.getElementById("loginPopup");
        var profilInfo = document.getElementById("profil-info");
        if (loginPopup.style.display === "none" || loginPopup.style.display === "") {
        popup.style.display = "none";
        loginPopup.style.display = "block";
        profilInfo.style.display = "none"; // Hide user information
    } else {
            loginPopup.style.display = "none";
        }
    }
    
    
    </script>
    <script src="AutoWorld.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>AutoWorld</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-9nIvBvFov0C6ZU4ZpFrPF3JslBPbFd3fkw/JQ0l1qd+Tz+w3KGcflzZmTV2Jez6K/kCdsEZ/tKGQtuzcfCY5Kw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="AutoWorld.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body >
  <header class="navbar">
    <div class="logo">
        <img src="images/logo.png" alt="Car Express logo">
    </div>
    <nav>
        <ul>
            <li><a href="AutoWorld.php"><span>Accueil</span></a></li>
            <li><a href="model.php"><i class="fas fa-car"></i> Modèles</a></li>
            <li><a href="material.php"><i class="fas fa-tools"></i></a></li>
            <li><a href="#" onclick="togglePopup()"><i class="fas fa-user"></i></a></li>
            <li><a href="aboutus.php"><span id="aboutus">A propos</span></a></li> 
        </ul>
    </nav>
</header>
    <!-- Popup -->
    <div class="popup-container" id="popup">
        <div class="popup">
            <span class="close" onclick="togglePopup()">&times;</span>
            <h3>Connectez-vous avec votre AutoWorld ID me.</h3><br>
            <div class="buttons">
                <button onclick="openLoginPopup()">Se connecter</button>
                <button onclick="location.href='loginCreerCompte.php'">S'inscrire</button>
            </div>
        </div>
    </div>
    <div id="loginPopup">
        <form id="loginForm" method='POST' action='connect.php'>
            <span class="close" onclick="openLoginPopup()">&times;</span>
            <h2>Connexion</h2>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required><br>
    
            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" required><br>
    
            <a href="#" style="color: #82857d;">Mot de passe oublié ?</a><br>
    
            <input type="submit" value="Se connecter">
        </form>
        <p class="center">Vous n'avez pas de compte ? <a  style="color: #82857d;" href="loginCreerCompte.php">S'inscrire</a></p>
    </div>
    
<!-- Profil informations -->
<div class="profil-container" id="profil-info" style='display: none;'>
    <div class="profil-header">
        <div class="logo">AutoWorld</div>
        <span class="close" onclick="closeProfilePopup()">&times;</span>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Messages</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="logout.php">Logout</a></li> <!-- Link to logout page -->
            </ul>
        </nav>
    </div>

    <div class="container">
        <section class="profile-section">
            <h2>Profile Information</h2>
            <div class="profile-picture">
                <!-- Profile Picture will be displayed here -->
            </div>

            <!-- Display user's name and email here -->
            <?php
            if (isset($_SESSION['user_email'])) {
                // If user is logged in, get name and email from session
                $username = $_SESSION['username'];
                $user_email = $_SESSION['user_email'];
                ?>
                <div class="username"><?php echo $username; ?></div>
                <div class="email-address"><?php echo $user_email; ?></div>
            <?php
            } else {
                // If user is not logged in, show default text or nothing
                ?>
                <div class="username">Guest</div>
                <div class="email-address">guest@example.com</div>
            <?php
            }
            ?>
            <button class="edit-profile">Edit Profile</button>
            <!-- Display other user information here -->
        </section>

        <!-- Other sections like Personal Details, Account Information, Activity History, Preferences, and Saved Items -->

        <!-- Shop Icon for Cars -->
        <a href="cars.php" class="shop-icon"><img src="images/shop-icon.jpg" alt="Shop Cars" style="width: 60px; height: 60px;"></a>
    </div>
</div>




<section id="about">
  <div class="container-aboutus">
    <h2>À Propos d'AutoWorld</h2>
    <p>Bienvenue chez AutoWorld, votre destination ultime pour tout ce qui concerne les voitures et la réparation automobile.</p>
    <table border="2">
      <tr>
        <th><h3>Notre Mission</h3></th>
        <th><h3>Notre Engagement</h3></th>
      </tr>
      <tr>
        <td><p>Notre mission est de fournir à nos clients une expérience exceptionnelle en leur offrant une sélection de véhicules de haute qualité, des pièces et accessoires fiables, ainsi qu'un service de réparation professionnel et fiable.</p></td>
        <td><p>Nous nous engageons à satisfaire pleinement les besoins et les attentes de nos clients en leur proposant des produits et des services de la plus haute qualité, ainsi qu'un service client exceptionnel.</p></td>
      </tr>
      <tr>
        <th><h3>Nos Services</h3></th>
        <th><h3>Notre Équipe</h3></th>
      </tr>
      <tr>
        <td>
          <ul>
            <li>Vente de voitures neuves et d'occasion</li>
            <li>Vente de pièces détachées et accessoires</li>
            <li>Réparation et entretien de véhicules</li>
            <li>Service de diagnostic automobile</li>
            <li>Conseils d'experts et assistance technique</li>
          </ul>
        </td>
        <td><p>Notre équipe est composée de professionnels passionnés par l'automobile, dévoués à fournir des solutions efficaces et des conseils personnalisés à chaque client.</p></td>
      </tr>
    </table>
    <h3>Contactez-Nous</h3>
    <p>N'hésitez pas à nous contacter pour toute question, demande de renseignements ou assistance. Nous sommes là pour vous aider.</p>
    <p><strong>Téléphone :</strong> +216 51816764</p>
    <p><strong>Email :</strong> info@autoworld.com</p>
  </div>
</section>

  <footer>
    <div class="container">
      <div class="footer-grid">
        <div class="footer-section">
          <h3>Nous Contacter</h3>
          <p><strong>Téléphone :</strong> +216 51816764</p>
          <p><strong>Email :</strong> info@autoworld.com</p>
          <p><strong>Adresse :</strong> ENSI,Manouba,Tunisie</p>
        </div>
        <div class="footer-section">
          <h3>Restez Connecté</h3>
          <ul class="social-icons">
            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
          </ul>
          <p>Inscrivez-vous à notre newsletter pour recevoir les dernières actualités et offres exclusives :</p>
          <form class="newsletter-form" action="inscription.php" method="post">
            <input type="email" name="email" placeholder="Votre Email" required>
            <button type="submit">S'inscrire</button>
          </form>
        </div>
      </div>
      <div class="copyright">
        <p>&copy; 2024 AutoWorld. Tous droits réservés.</p>
      </div>
    </div>
  </footer>
  <script src="AutoWorld.js"></script>
</body>
</html>