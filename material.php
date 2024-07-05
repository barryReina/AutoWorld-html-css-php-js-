<!DOCTYPE html>
<html lang="en">
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
        
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AutoWorld</title>
<link rel="stylesheet" href="AutoWorld.css">
<script src="AutoWorld.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-9nIvBvFov0C6ZU4ZpFrPF3JslBPbFd3fkw/JQ0l1qd+Tz+w3KGcflzZmTV2Jez6K/kCdsEZ/tKGQtuzcfCY5Kw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <header class="navbar">
        <div class="logo">
            <img src="images/logo.png" alt="Car Express logo">
        </div>
        <div class="box">
            <form>
                <input type="search" id="searchInput" name="" placeholder="Rechercher...">
                <button type="submit"  id="searchButton"><i class="fas fa-search"></i></button>
            </form>
        </div>
          
        <nav>
            <ul>
                <li><a href="AutoWorld.php"><span >Accueil</span></a></li>
                <li><a href="model.php"><i class="fas fa-car"></i> Modèles</a></li>
                <li><a href="material.php"><i class="fas fa-tools" style="color:bisque;"></i></a></li>
                <li><a href="#" onclick="togglePopup()"><i class="fas fa-user"></i></a></li>
                <li><a href="aboutus.php">A propos</a></li> 
            </ul>
        </nav>
    </header>
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
<div class="profil-container" id="profil-info"  style="display: none";>
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


<h2>Vos pièces détachées</h2>
<div class="grid-container-model" id="model-container">
    <!-- Example items provided -->
    <div class="item-model">
        <img src="images/retro 1.png" alt="best1">
        <h3>Retro 1</h3>
        <p>1000DT</p>
        <form method="post" action="achat-pieces.php">
            <input type="hidden" name="nom_piece" value="Retro 1">
            <input type="hidden" name="prix" value="1000">
            <button type="submit" class="buy-button">Acheter</button>
        </form>
    </div>
    <div class="item-model">
        <img src="images/retro 2.png" alt="best1">
        <h3>Retro 2</h3>
        <p>2000DT</p>
        <form method="post" action="achat-pieces.php">
            <input type="hidden" name="nom_piece" value="Retro 2">
            <input type="hidden" name="prix" value="2000">
            <button type="submit" class="buy-button">Acheter</button>
        </form>
    </div>
    <div class="item-model">
        <img src="images/retro 1.png" alt="best1">
        <h3>Retro 1</h3>
        <p>1400DT</p>
        <form method="post" action="achat-pieces.php">
            <input type="hidden" name="nom_piece" value="Retro 1">
            <input type="hidden" name="prix" value="1400">
            <button type="submit" class="buy-button">Acheter</button>
        </form>
    </div>
    <div class="item-model">
        <img src="images/retro 2.png" alt="best1">
        <h3>Retro 2</h3>
        <p>3500DT</p>
        <form method="post" action="achat-pieces.php">
            <input type="hidden" name="nom_piece" value="Retro 2">
            <input type="hidden" name="prix" value="3500">
            <button type="submit" class="buy-button">Acheter</button>
        </form>
    </div>

    <div class="item-model">
        <img src="images/pneu 1.png" alt="best1">
        <h3>Pneu 1</h3>
        <p>1000DT</p>
        <form method="post" action="achat-pieces.php">
            <input type="hidden" name="nom_piece" value="Pneu 1">
            <input type="hidden" name="prix" value="1000">
            <button type="submit" class="buy-button">Acheter</button>
        </form>
    </div>
    <div class="item-model">
        <img src="images/pneu 2.png" alt="best1">
        <h3>Pneu 2</h3>
        <p>1000DT</p>
        <form method="post" action="achat-pieces.php">
            <input type="hidden" name="nom_piece" value="Pneu 2">
            <input type="hidden" name="prix" value="1000">
            <button type="submit" class="buy-button">Acheter</button>
        </form>
    </div>
    <div class="item-model">
        <img src="images/pneu 1.png" alt="best1">
        <h3>Pneu 1</h3>
        <p>1000DT</p>
        <form method="post" action="achat-pieces.php">
            <input type="hidden" name="nom_piece" value="Pneu 1">
            <input type="hidden" name="prix" value="1000">
            <button type="submit" class="buy-button">Acheter</button>
        </form>
    </div>
    <div class="item-model">
        <img src="images/pneu 2.png" alt="best1">
        <h3>Pneu 2</h3>
        <p>1000DT</p>
        <form method="post" action="achat-pieces.php">
            <input type="hidden" name="nom_piece" value="Pneu 2">
            <input type="hidden" name="prix" value="1000">
            <button type="submit" class="buy-button">Acheter</button>
        </form>
    </div>
    <div class="item-model">
        <img src="images/retro 1.png" alt="best1">
        <h3>Retro 1</h3>
        <p>1400DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/retro 2.png" alt="best1">
        <h3>Retro 2</h3>
        <p>3500DT</p>
        <button class="buy-button">Acheter</button>
    </div>

    <div class="item-model">
        <img src="images/retro 1.png" alt="best1">
        <h3>Retro 1</h3>
        <p>1000DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/retro 2.png" alt="best1">
        <h3>Retro 2</h3>
        <p>2000DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/retro 1.png" alt="best1">
        <h3>Retro 1</h3>
        <p>1400DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/retro 2.png" alt="best1">
        <h3>Retro 2</h3>
        <p>3500DT</p>
        <button class="buy-button">Acheter</button>
    </div>

    <div class="item-model">
        <img src="images/retro 1.png" alt="best1">
        <h3>Retro 1</h3>
        <p>1000DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/retro 2.png" alt="best1">
        <h3>Retro 2</h3>
        <p>2000DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/retro 1.png" alt="best1">
        <h3>Retro 1</h3>
        <p>1400DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/retro 2.png" alt="best1">
        <h3>Retro 2</h3>
        <p>3500DT</p>
        <button class="buy-button">Acheter</button>
    </div>



    <div class="item-model">
        <img src="images/mercedes motor.png" alt="best1">
        <h3>Mercedes motor</h3>
        <p>1000DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/mercedes motor.png" alt="best1">
        <h3>Mercedes motor</h3>
        <p>1000DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/mercedes motor.png" alt="best1">
        <h3>Mercedes motor</h3>
        <p>1000DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/mercedes motor.png" alt="best1">
        <h3>Mercedes motor</h3>
        <p>1000DT</p>
        <button class="buy-button">Acheter</button>
    </div>

    <div class="item-model">
        <img src="images/mercedes motor.png" alt="best1">
        <h3>Mercedes motor</h3>
        <p>1000DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/mercedes motor.png" alt="best1">
        <h3>Mercedes motor</h3>
        <p>1000DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/mercedes motor.png" alt="best1">
        <h3>Mercedes motor</h3>
        <p>1000DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/mercedes motor.png" alt="best1">
        <h3>Mercedes motor</h3>
        <p>1000DT</p>
        <button class="buy-button">Acheter</button>
    </div>

    <div class="item-model">
        <img src="images/mercedes motor.png" alt="best1">
        <h3>Mercedes motor</h3>
        <p>1000DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/mercedes motor.png" alt="best1">
        <h3>Mercedes motor</h3>
        <p>1000DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/mercedes motor.png" alt="best1">
        <h3>Mercedes motor</h3>
        <p>1000DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/mercedes motor.png" alt="best1">
        <h3>Mercedes motor</h3>
        <p>1000DT</p>
        <button class="buy-button">Acheter</button>
    </div>


    <div class="item-model">
        <img src="images/retro 1.png" alt="best1">
        <h3>Retro 1</h3>
        <p>1000DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/retro 2.png" alt="best1">
        <h3>Retro 2</h3>
        <p>1000DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/retro 1.png" alt="best1">
        <h3>Retro 1</h3>
        <p>1000DT</p>
        <button class="buy-button">Acheter</button>
    </div>
    <div class="item-model">
        <img src="images/retro 2.png" alt="best1">
        <h3>Retro 2</h3>
        <p>1000DT</p>
        <button class="buy-button">Acheter</button>
    </div>
  
   
    <!-- End of repeated items -->
</div>

<div class="pagination" id="pagination-container">
    <!-- Pagination buttons will be dynamically added here -->
</div>

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
</body>
</html>

